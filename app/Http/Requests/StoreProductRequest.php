<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'description' => 'required|min:2',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'promotion' => 'required|numeric',
            'image' => 'image',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu 2 ký tự',
            'max' => ':attribute tối đã 255 ký tự',
            'numeric' => ':attribute phải là một số',
            'image' => ':attribute không là hình ảnh',
            'unique' => ':attribute đã tồn tại',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Đơn giá sản phẩm',
            'promotion' => 'Giá khuyến mãi sản phẩm',
            'image' => 'Hình ảnh sản phẩm',
        ];
    }
}
