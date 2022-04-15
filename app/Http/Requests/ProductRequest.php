<?php

namespace App\Http\Requests;

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
            'product_name' => 'required',
            'product_code' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif|dimensions:max_width=2000,max_height=2000',
        ];
    }

    public function messages()
    {
        return[
            'product_name.required' => 'The product name is required',
            'product_code.required' => 'The product code is required',
            'image.dimensions' => 'The image dimensons must be maximum of 2000*2000'
        ];
    }
}
