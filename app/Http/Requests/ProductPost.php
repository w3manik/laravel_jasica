<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'description'=>'required',
            'product_quentity'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>'Category name?',
            'subcategory_id.required'=>'SubCategory name?',
            'product_name.required'=>'product_name?',
            'product_price.required'=>'Product Price?',
            'description.required'=>'Description',
            'product_quentity.required'=>'Quentity',
        ];
    }
}
