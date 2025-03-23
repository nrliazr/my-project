<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeAddressUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'required|string|max:255',
            'post_code' => 'required|regex:/[0-9]/|digits:5',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ];
    }
}
