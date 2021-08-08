<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function show(){
        return view('login.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->intended('member');
            // return view('login.login');
        }
        // ↑ここでログインしたとしても、ページ遷移すると羽つけられる。
    }

    public function top()
    {
        if (Auth::check()) {
          // ログイン済みのときの処理
        return view('top-member');
        } else {
        // ログインしていないときの処理(現在、ログインされない状況)
        return view('top');
        }
    }

    public function logout()
    {
        return Auth::logout();
    }
}
