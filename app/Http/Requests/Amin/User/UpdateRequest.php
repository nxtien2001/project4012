<?php

namespace App\Http\Requests\Amin\User;

use App\Rules\RuleEmailCheckUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                new RuleEmailCheckUser
            ],
            'address' => 'required',
            'role' => 'required|in:' . implode(',', config('common.user.role')),
            'gender' => 'required|in:' . implode(',', config('common.user.gender')),
        ];
    }
    public function messages()
    {
        return [

            'required' => ':attribute Không được để trống trường này!',
            'name.max' => 'Tên không được quá 50 kí tự',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            // 'role' => 'Tài khoản',
            // 'gender' => 'Giới tính',
        ];
    }
}
