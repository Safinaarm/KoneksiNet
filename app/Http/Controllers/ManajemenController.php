<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Pastikan Anda memiliki model Menu

class ManajemenController extends Controller
{
    public function index()
    {
        // Daftar semua menu
        $allMenus = [
            ['title' => 'Dashboard', 'url' => '/dashboard'],
            ['title' => 'Book Heaven', 'url' => '#'],
            ['title' => 'Kategori', 'url' => '/kategoris'],
            ['title' => 'Buku', 'url' => '/bukus'],
            ['title' => 'Checkcam', 'url' => '#'],
            ['title' => 'Snapshot', 'url' => '/photo'],
            ['title' => 'Map Quest', 'url' => '/map'],
            ['title' => 'Messages', 'url' => route('messages.create')],
            ['title' => 'Docs', 'url' => route('chat.index')],
            // Tambahkan menu tambahan sesuai kebutuhan
        ];

        return view('menu.manajemen', compact('allMenus'));
    }

    public function update(Request $request)
    {
        // Simpan pilihan menu ke database atau session
        $selectedMenus = $request->input('menus', []);

        // Logika untuk menyimpan pilihan menu
        // Contoh: simpan ke session atau database

        return redirect()->route('menu.manajemen')->with('success', 'Menu berhasil diperbarui.');
    }
}