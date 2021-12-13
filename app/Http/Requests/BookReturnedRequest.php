<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookReturnedRequest extends FormRequest
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
            "retDate" => 'required|date|date_format:Y-m-d',
            "bookId" => 'required|exists:books,id',
            'issuedId'=>'required|exists:books_issueds,id,isReturn,!Y',
            "memberId" => 'required|exists:users,id,id,!1'

        ];
    }

    public function messages()
    {
        return [
            'retDate.required'=>'Return Date is required',
            'bookId.exists'=>'Book Id is does not exists',
            'memberId.exists'=>'Member does not exists',
            'issuedId.exists'=>'issued id doesnot exists'
        ];
    }
}
