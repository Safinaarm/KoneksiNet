<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Mawar Merah',
            'deskripsi' => 'Bunga mawar merah segar, simbol cinta.',
            'harga' => 50000,
            'stok' => 50,
        ]);

        Barang::create([
            'nama_barang' => 'Melati',
            'deskripsi' => 'Bunga melati wangi, cocok untuk acara pernikahan.',
            'harga' => 30000,
            'stok' => 40,
        ]);

        Barang::create([
            'nama_barang' => 'Lily',
            'deskripsi' => 'Bunga lily putih, elegan dan cantik.',
            'harga' => 70000,
            'stok' => 30,
        ]);

        Barang::create([
            'nama_barang' => 'Anggrek',
            'deskripsi' => 'Bunga anggrek eksotis, berbagai warna.',
            'harga' => 100000,
            'stok' => 25,
        ]);

        Barang::create([
            'nama_barang' => 'Dahlia',
            'deskripsi' => 'Bunga dahlia berwarna-warni, sangat menarik.',
            'harga' => 45000,
            'stok' => 35,
        ]);

        Barang::create([
            'nama_barang' => 'Sunflower',
            'deskripsi' => 'Bunga matahari ceria, simbol kebahagiaan.',
            'harga' => 60000,
            'stok' => 20,
        ]);

        // Tambahkan data bunga lainnya sesuai kebutuhan
    }
}

