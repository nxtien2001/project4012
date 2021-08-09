<?php

namespace App\Http\Requests\Amin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required|unique:posts',
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
            'name.unique' => 'Tên bài viết đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên bài viết',
            'description' => 'Mô tả',
            'content' => 'Nội dung bài viết',
            'image' => 'Ảnh'
        ];
    }
}
