<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogPost extends FormRequest
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
            'title'=>'required',
            'blog_validity'=>'required',
            'blog_desc'=>'required',
            'blog_img'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'What is the title',
            'blog_validity.required'=>'Validity None?',
            'blog_desc.required'=>'Type Few text',
            'blog_img.required'=>'Imge Need',
        ];
    }
}
