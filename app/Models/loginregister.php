<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginRegister extends Authenticatable
{
    protected $table = 'loginregister'; // Pastikan nama tabel sesuai
    protected $fillable = ['username', 'email', 'password']; // Pastikan email ada di sini


    protected $hidden = [
        'password',
    ];
}
