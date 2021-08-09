<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCateRequest extends FormRequest
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
            'name' => 'required|unique:table_categories|max:50',
        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Không được để trống trường này!',
            'name.max' => 'Danh mục không được quá 50 kí tự',
            'name.unique' => 'Danh mục đã tồn tại'
        ];
    }
}
