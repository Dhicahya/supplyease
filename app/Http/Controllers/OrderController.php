<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('supplier', 'user')->get();
        return view('pages.orders.index', compact('orders'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('pages.orders.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $totalPrice = 0;
        foreach ($validated['product_ids'] as $index => $productId) {
            $product = Product::find($productId);
            $totalPrice += $product->price * $validated['quantities'][$index];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'supplier_id' => $validated['supplier_id'],
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        foreach ($validated['product_ids'] as $index => $productId) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $validated['quantities'][$index],
                'price' => Product::find($productId)->price,
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('order.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function groupedByStatus()
    {
        $orders = Order::with('supplier')
            ->get()
            ->groupBy('status');

        return view('pages.orders.status', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('supplier', 'user', 'items.product')->findOrFail($id);
        return view('pages.orders.detail', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
