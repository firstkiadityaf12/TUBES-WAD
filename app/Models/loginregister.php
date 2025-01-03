<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginRegister extends Authenticatable
{
    protected $table = 'loginregister';
    protected $fillable = ['name', 'email', 'password'];


    protected $hidden = [
        'password',
    ];
}
