<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    #use SoftDelete;

    protected $table = 'users';

    protected $fillable = [
        'name',
        #'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
