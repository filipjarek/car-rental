<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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

            'name' => 'required|max:255',
            'NIP' => 'required|string|digits:10',
            'phone' => 'integer|digits:9|required',
            'street' => 'required|max:50',
            'zip_code' => 'required|max:6',
            'city' => 'required|max:50',
            'bank_number' => 'required|max:50',

        ];
    }
}
