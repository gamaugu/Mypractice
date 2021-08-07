<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Member;

class RegisterController extends Controller
{
    private $formItems = ['name_sei','name_mei','nickname','gender','password','password_confirmation','email'];

	private $validator = [
        'name_sei' =>'required|max:20|string',
        'name_mei' =>'required|max:20|string',
        'nickname' =>'required|max:10|string',
        "gender" => "required|integer|in:1,2",
        "password" => "required|string|min:8|max:20|confirmed",
        "password_confirmation" => "required|string|min:8|max:20",
        "email" => "required|unique:members|string|max:200|email",
	];

    // フォーム表示用
    public function form()
    {
        return view('register.register');
    }

    // ここでバリデーション
    public function validation(Request $request)
    {
        $input = $request->only($this->formItems);
        $validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->action("RegisterController@form")
				->withInput()
				->withErrors($validator);
		}

        //セッションに書き込む
		$request->session()->put("form_input", $input);

		return redirect()->action("RegisterController@confirm");

    }

        // 確認画面表示
        public function confirm(Request $request)
        {
        //セッションから値を取り出す
		$input = $request->session()->get("form_input");

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("RegisterController@form");
		}
		return view("register.confirm",["input" => $input]);
        }

        public function send(Request $request){
  		//セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //戻るボタンが押された時
		if($request->has("back")){
		return redirect()->action("RegisterController@form")
		->withInput($input);
		}

        //セッションに値が無い時はフォームに戻る
        if(!$input){
        return redirect()->action("RegisterController@form");
        }

        //ここでメールを送信、DBへの登録するなどを行う
        $member = new Member();
        $member->name_sei = $input["name_sei"];
        $member->name_mei = $input["name_mei"];
        $member->nickname = $input["nickname"];
        $member->gender = $input["gender"];
        $member->password = $input["password"];
        $member->email = $input["email"];

        $member->save();


          //セッションを空にする
        $request->session()->forget("form_input");

        return redirect()->action("RegisterController@complete");
        }

        function complete(){
            return view("register.complete");
        }
}
