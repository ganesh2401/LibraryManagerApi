<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookIssuedRequest extends FormRequest
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
            "issueDate"=>'required|date|date_format:Y-m-d',
            "retDate"=>'required|date|after_or_equal:issueDate|date_format:Y-m-d',
            "bookId"=>'required|exists:books,id,totalAvail,!0',
            "memberId"=>'required|exists:users,id,id,!1'
            //
        ];
    }

    public function messages()
    {
        return [
            'issueDate.required' => 'Issue Date is required!',
            'retDate.string'=>'Return Date is required',
            'bookId.exists'=>'Book is does not exists Or Not Available',
            'memberId.exists'=>'Member does not exists',
            'retDate.after_or_equal'=>"return date is equalTo or greater than issue date"
        ];
    }
}
