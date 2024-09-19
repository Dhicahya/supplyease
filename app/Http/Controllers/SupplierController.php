<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan semua supplier
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.suppliers.index', compact('suppliers'));
    }

    // Menampilkan form untuk menambahkan supplier baru
    public function create()
    {
        return view('pages.suppliers.create');
    }

    // Menyimpan supplier baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Supplier::create($validated);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Menampilkan detail supplier
    public function show(Supplier $supplier)
    {
        return view('pages.suppliers.show', compact('supplier'));
    }

    // Menampilkan form edit supplier
    public function edit(Supplier $supplier)
    {
        return view('pages.suppliers.update', compact('supplier'));
    }

    // Mengupdate supplier
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $supplier->update($validated);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Menghapus supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
