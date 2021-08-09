<?php

namespace App\Http\Requests\Amin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'description' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'required' => ':attribute không được để trống!',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên bài viết',
            'description' => 'Mô tả',
            'content' => 'Nội dung bài viết',
            'image' => 'Ảnh',
            'status' => 'Trạng thái',
        ];
    }
}
