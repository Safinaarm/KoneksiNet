<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat'; // Menghubungkan dengan tabel 'chat'
    
    protected $fillable = ['message', 'image', 'document', 'email'];

}
