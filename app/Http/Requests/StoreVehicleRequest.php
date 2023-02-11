<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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

            'name' => 'required|max:50',
            'category' => 'required',
            'color' => 'max:15|nullable',
            'year' => 'required|numeric|digits:4|between:1950,2050',
            'capacity' => 'required|string|max:5',
            'power' => 'required|string|max:5',

        ];
    }
}
