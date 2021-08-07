<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class RegisterController extends Controller
{
    // フォーム表示用
    public function form()
    {
        return view('register.register');
    }

    // ここでバリデーション
    public function validation(Request $request)
    {
        $request->validate([
            'name_sei' =>'required|max:20|string',
            'name_mei' =>'required|max:20|string',
            'nickname' =>'required|max:10|string',
            "gender" => "required|integer|in:1,2",
            "password" => "required|string|min:8|max:20|confirmed",
            "password_confirmation" => "required|string|min:8|max:20",
            "email" => "required|unique:members|string|max:200|email",
        ]);
        $request->session()->put('name_sei', $request->input('name_sei'));
        $request->session()->put('name_mei', $request->input('name_mei'));
        $request->session()->put('nickname', $request->input('nickname'));
        $request->session()->put('gender', $request->input('gender'));
        $request->session()->put('email', $request->input('email'));

        return redirect()
        ->route('register.confirm');
    }

        // 確認画面表示
        public function confirm()
        {
            return view('register.confirm');
        }




        function complete(){
            return view('register.complete');
        }
}
