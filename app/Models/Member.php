<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{

    protected $fillable = [
        'name_sei',
        'name_mei',
        'nickname',
        'gender',
        'password',
        'password_confirmation',
        'email',
    ];
}
