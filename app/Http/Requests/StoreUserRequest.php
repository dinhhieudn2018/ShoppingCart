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
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng định dạng',
           
            'min' => ':attribute tối thiểu 5 ký tự',
            'max' => ':attribute tối đã 255 ký tự',
        ];
    }
    public function attributes()
    {
       return [
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
       ];     
    }
}
