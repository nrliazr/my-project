<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentInformationUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'students' => 'array',
            'students.*.id' => 'required|integer|exists:students,id',
            'students.*.sname' => 'required|string|max:255',
            'students.*.mykid_number' => 'required|regex:/[0-9]{12}/',
            'students.*.sbirth_date' => 'required|string|max:255',
            'students.*.age' => 'required|string|max:255',
            'students.*.gender' => 'required|string|max:255',
        ];
    }
}
