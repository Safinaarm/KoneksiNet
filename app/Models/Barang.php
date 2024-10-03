<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Ini opsional jika nama tabel sesuai dengan konvensi
    protected $fillable = ['nama_barang', 'deskripsi', 'harga', 'stok'];
}
