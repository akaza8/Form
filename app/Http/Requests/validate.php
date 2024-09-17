<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|alpha|max:255",
            "email"=>"required|email",
            "degrees.*"=>"nullable|alpha",
            "percentages.*"=>"nullable|numeric|min:0|max:100",
        ];
    }
    public function messages(): array
    {
        return [
            "name.required"=>"The name field is required",
            "name.string"=>"The name must be a string",
            "email.required"=> "The email field is required",
            'degrees.*.string' => 'Each degree should be a valid string.',
            'percentages.*.numeric' => 'Each percentage should be a valid number.',
            'percentages.*.min' => 'Percentage should be at least 0.',
            'percentages.*.max' => 'Percentage should not be more than 100.',
        ];
    }
}
