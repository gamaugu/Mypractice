<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_sei' =>'required|max:20|string',
            'name_mei' =>'required|max:20|string',
            'nickname' =>'required|max:10|string',
            "gender" => "required|integer|in:1,2",
            "password" => "required|string|min:8|max:20|confirmed",
            "password_confirmation" => "required|string|min:8|max:20",
            "email" => "required|unique:members|string|max:200|email"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です',
            'title.min' => ':min文字以上で入力してください',
            'body.required' => '本文は必須です',
        ];
    }
}
