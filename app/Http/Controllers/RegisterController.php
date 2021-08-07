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
        $input = $request->only($this->formItems);
        $validatedData = $request->validate([
            'name_sei' =>'required|max:20|string',
            'name_mei' =>'required|max:20|string',
            'nickname' =>'required|max:10|string',
            "gender" => "required|integer|in:1,2",
            "password" => "required|string|min:8|max:20|confirmed",
            "password_confirmation" => "required|string|min:8|max:20",
            "email" => "required|unique:members|string|max:200|email",
        ]);
        $input = $request->only($this->formItems);

        return redirect()
        ->route('register.confirm');
    }

        // 確認画面表示
        public function confirm(Request $request)
        {
            $input = $request->session()->get("form_input");
            return view('register.confirm',["input" => $input]);
        }
}
