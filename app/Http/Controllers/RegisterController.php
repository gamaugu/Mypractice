<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class RegisterController extends Controller
{
    public function form()
    {
        return view('register.register');
    }
}
