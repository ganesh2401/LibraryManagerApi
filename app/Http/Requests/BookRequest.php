<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'bookTitle'=>'required|string',
            'edition'=>'required|string',
            'authId'=>'required|exists:authors,id',
            'catId'=>'required|exists:books_catagories,id',
            'totalAvail'=>'required',
            'totalIss'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'authId.exists'=>'Author Id is doesnot exists',
            'catId.exists'=>'Category Does not exists',
        ];
    }
}
