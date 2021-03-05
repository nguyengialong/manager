<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

            'password'   => 'required|min:8',
            'email'      => 'required',


        ];
    }

    public function messages(){

        return [

            'password.required' => 'Mật khẩu không được để trống',
            'email.required' => 'Email không được để trống',
            'required' => 'Không được để trống',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 kí tự'

        ];
    }
}
