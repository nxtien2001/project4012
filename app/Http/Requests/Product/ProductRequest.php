<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:50',
            'price' => 'required|integer',
            'sale_price' => 'lte:price',
            'quantity' => 'required|integer',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required',
            'short_content' => 'required|max:300',
            'long_content' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'required' => ':attribute Không được để trống trường này!',
            'name.max' => 'Tên không được quá 50 kí tự',
            'price.integer' => 'Giá phải là số dương',
            'sale_price.lte' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'image.mimes' => 'Định dạng ảnh không hợp lệ',
            'short_content.max' => 'Mô tả không quá 300 kí tự',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'quantity' => 'Số lượng',
            'image' => 'Hình ảnh',
            'category_id' => 'Danh mục',
            'short_content' => 'Mô tả',
            'long_content' => 'Nội dung',
        ];
    }
}
