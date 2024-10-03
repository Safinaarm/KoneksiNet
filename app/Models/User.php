<?php

// app/Models/User.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    // Atribut yang dapat diisi massal
    protected $fillable = [
        'name', 'email', 'password', 'no_hp', 'wa', 'pin', 'role'
    ];

    // Atribut yang harus di-hash
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Atribut yang diperlakukan sebagai timestamp
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin()
    {
        return substr($this->email, -10) === '@admin.com';
    }
    public function messages()
    {
        return $this->hasMany(Message::class); // Adjust if the relationship is different
    }
}
