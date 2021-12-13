<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCategoryRequest extends FormRequest
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
            'catName'=>'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'catName.required' => 'Name is required!',
            'catName.string'=>'Please used only name'
        ];
    }
}
