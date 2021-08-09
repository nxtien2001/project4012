<?php

namespace App\Http\Requests\Amin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'password' => 'required|min:6|max:50',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'gender' => 'required|in:' . implode(',', config('common.user.gender')),
        ];
    }
    public function messages()
    {
        return [

            'required' => ':attribute Không được để trống trường này!',
            'name.max' => 'Tên không được quá 50 kí tự',
            'password.min' => 'Mật khẩu phải từ 6-50 kí tự',
            'password.max' => 'Mật khẩu phải từ 6-50 kí tự',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
        ];
    }
}
