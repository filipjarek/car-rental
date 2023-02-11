<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => [

                'required',
                'string',
                'email',
                'max:255',
                'unique:employees'
            ],
            'gender' => 'required',
            'phone' => 'numeric|digits:9|nullable',
            'address' => 'required|max:50',
            'zip_code' => 'required|max:6',
            'employment_date' => 'required|date|',
            'dismissal_date' => 'date|nullable',

        ];
    }
}
