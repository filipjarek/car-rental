<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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

            'fullname' => 'required|max:50',
            'date_of_birth' => 'date|nullable',
            'gender' => 'required',
            'idcard' => 'required|max:9|nullable',
            'phone' => 'numeric|digits:9|nullable',
            'address' => 'required|max:50',
            'zip_code' => 'required|max:6',

        ];
    }
}
