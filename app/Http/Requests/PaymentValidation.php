<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaymentValidation extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cardNo' => 'required|max:19',
            'CVV' => 'required|max:3',
            'name' => 'required',
            'address' => 'required'
            //
        ];
    }
    public function messages()
    {
        return [
            'cardNo.required' => 'A card number is required',
            'CVV.required'  => 'A CVV is required',
            'name.required' => 'A Name is required',
            'address.required' => 'An address is required'
        ];
    }
}
