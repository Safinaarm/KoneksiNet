<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function create()
    {
        $barangs = Barang::all(); // Ambil semua data barang
        return view('admin.add-barang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.add-barang')->with('success', 'Barang berhasil ditambahkan!');
    }
}
