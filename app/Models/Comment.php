<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'content']; // Pastikan kolom 'content' ada di sini

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
