<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
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
