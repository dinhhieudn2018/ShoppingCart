<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|min:10|max:11,numeric',
            'address' => 'required',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu 10 kí tự',
            'max' => ':attribute tối đa 211 kí tự',
            'numeric' => ':attribute phải là một số',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }
}
