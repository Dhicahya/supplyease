<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', compact('products'));
    }

    // Menampilkan form untuk menambahkan produk baru
    public function create()
    {
        return view('pages.product.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('pages.product.show', compact('product'));
    }

    // Menampilkan form edit produk
    public function edit(Product $product)
    {
        return view('pages.product.update', compact('product'));
    }

    // Mengupdate produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
