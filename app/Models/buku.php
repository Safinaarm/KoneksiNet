<?php

// App\Models\Buku.php
namespace App\Models;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori', 'kode', 'judul', 'pengarang'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }
}

// App\Models\Kategori.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }
}

