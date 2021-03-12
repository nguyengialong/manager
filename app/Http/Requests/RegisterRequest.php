<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

            'name'    => 'required',
            'email'   => 'required|unique:users',
            'phone'   => 'numeric',
            'password'=> 'required|min:8',
            're_password'=> 'required|same:password',
            'address' => 'required',
        ];
    }

    public function messages()
    {

        return [

            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'password.min' => 'Mật khẩu có ít nhất 8 kí tự',
            're_password.same' => 'Mật khẩu không giống nhau',
            'address.required' => 'Địa chỉ không được để trống',
            'required' => 'Không được để trống'
        ];
    }
}
