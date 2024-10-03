<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'sender',
        'recipient',
        'subject',
        'message_text',
    ];

    public $timestamps = true;

    // Relasi ke pengguna pengirim
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender', 'email');
    }

    // Relasi ke pengguna penerima
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient', 'email'); 
    }
}
