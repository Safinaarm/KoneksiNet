<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index()
    {
        $bukus = Buku::with('kategori')->get();
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown

        return view('bukus', compact('bukus', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index');
    }
// app/Http/Controllers/BukuController.php

public function edit($id)
{
    $buku = Buku::findOrFail($id);
    return view('bukus.edit', compact('buku'));
}

    // Metode edit, update, dan destroy tetap sama
}
