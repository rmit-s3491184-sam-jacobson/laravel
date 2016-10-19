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
            'cardNo' => 'required|ccn',
            'expire' => 'required|ccd',
            'CVV' => 'required|cvc',
            'name' => 'required',
            'address' => 'required'
            //
        ];
    }
    public function messages()
    {
        return [
            'cardNo.required' => 'A card number is required',
            'cardNo.ccn' => 'card number is not valid',
            'CVV.required'  => 'A CVV is required',
            'CVV.cvc'  => 'CVV is not valid',
            'expire.required' => 'A Date is required',
            'expire.ccd' => 'Date is not valid',
            'name.required' => 'A Name is required',
            'address.required' => 'An address is required'
        ];
    }
}
