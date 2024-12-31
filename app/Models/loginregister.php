<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginRegister extends Authenticatable
{
    protected $table = 'loginregister';
    protected $fillable = ['username', 'email', 'password'];


    protected $hidden = [
        'password',
    ];
}
