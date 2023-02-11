<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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

            'transaction_date' => 'required|date',
            'employee_id' => 'required',
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'rent_date' => 'required|date|nullable',
            'return_date' => 'required|date|nullable',
            'price' => 'required|integer|min:0',
            'finee' => 'required|integer|min:0',

        ];
    }
}
