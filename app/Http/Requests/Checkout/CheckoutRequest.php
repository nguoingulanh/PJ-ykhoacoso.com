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
            'username'          => 'required|max:255',
            'email'             => 'required|max:255',
            'phone'             => 'required|max:255',
            'city'              => 'required|max:255',
            'district'          => 'required|max:255',
            'ward'              => 'required|max:255',
            'address'           => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'username.required'          => 'Vui lòng nhập tên',
            'username.max'               => 'Không nhập quá 255 ký tự',
            'email.required'             => 'Vui lòng nhập email',
            'email.max'                  => 'Không nhập quá 255 ký tự',
            'city.required'              => 'Vui lòng nhập email',
            'city.max'                   => 'Không nhập quá 255 ký tự',
            'district.required'          => 'Vui lòng nhập email',
            'district.max'               => 'Không nhập quá 255 ký tự',
            'ward.required'              => 'Vui lòng nhập email',
            'ward.max'                   => 'Không nhập quá 255 ký tự',
            'address.required'           => 'Vui lòng nhập email',
            'address.max'                => 'Không nhập quá 255 ký tự',
        ];
    }
}
