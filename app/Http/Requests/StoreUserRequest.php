<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'address' => 'required',
        ];
    }

    public function messages(){

        return [

            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'password.min' => 'Mật khẩu có ít nhất 8 kí tự',
            'address.required' => 'Địa chỉ không được để trống'

        ];
    }
}
