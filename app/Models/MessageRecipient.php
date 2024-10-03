<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageRecipient extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['message_id', 'recipient_id', 'is_read'];
}
