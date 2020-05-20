<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
        $id = $this->route('product');
        return [
            'name'                      => "required|max:255|unique:products,name,$id,id",
            'content'                   => 'required',
            'original_price'            => 'required',
            'price'                     => 'required',
            'post_tag'                  => 'array',
            'status'                    =>'required',
            'img'                       => 'mimes:jpg,jpeg,png,gif,svg|max:5120'
        ];
    }
}
