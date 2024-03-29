<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            //
            'title'         =>      'required|max:255|unique:category,title',
            'description'   =>      'required'
        ];
    }
    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}
