<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'number_invoice' => 'required|max:20',
            'transaction_id' => 'required',
            'company_id' => 'required',
            'invoice_date' => 'required|date|',
            'buyer' => 'required|max:20',
            'NIP' => 'string|digits:10|nullable',
            'address' => 'required|max:50',
            'payment_method' => 'required|max:50',
            'service' => 'required|max:50',
            'VAT' => 'required|integer|digits:2',
        ];
    }
}
