<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'note' => 'required|max:300',
        ];
    }
    public function messages()
    {
        return [

            'required' => ':attribute không được để trống!',
            'email.email' => 'Email không đúng định dạng',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'note' => 'Ghi chú',
        ];
    }
}
