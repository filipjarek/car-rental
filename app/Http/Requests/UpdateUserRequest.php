<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UpdateUserRequest extends FormRequest
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

            'employee_id' => [

                'nullable',
                "unique:users,employee_id,$this->id,id"


            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                "unique:users,email,$this->id,id"
            ],
            'role' => 'required',

        ];
    }
}
