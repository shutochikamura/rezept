<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Guest_pathRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'guest_password' => 'required|min:8|unique:users|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',

        ];
    }
    public function messages(){
        return [
            'guest_password.required' => 'パスワードを入力して下さい',
            'guest_password.min' => 'パスワードは８文字以上入力して下さい',
            'guest_password.unique' => 'パスワードが他の方と重複しています',
            'guest_password.confirmed' => '同じパスワードを入力して下さい',
            'guest_password.regex' => 'パスワードは英数字および記号(例：!や?)を含める必要があります',
        ];
    }
}
