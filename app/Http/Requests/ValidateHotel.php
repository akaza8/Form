<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateHotel extends FormRequest
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
            'id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'type' => 'required|in:veg,non-veg',
            'contact' => 'required|string|max:15',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }
    public function messages(): array{
        return [

            'id.required' => 'The hotel ID field is required.',
            'id.string' => 'The hotel ID must be a string.',
            'id.max' => 'The hotel ID may not be greater than 255 characters.',
            'id.unique' => 'The hotel ID has already been taken.',

            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',

            'type.required' => 'The type field is required.',
            'type.in' => 'The selected type is invalid. Choose either Veg or Non-Veg.',

            'contact.required' => 'The contact number field is required.',
            'contact.string' => 'The contact number must be a string.',
            'contact.max' => 'The contact number may not be greater than 15 characters.',

            'rating.required' => 'The rating field is required.',
            'rating.integer' => 'The rating must be an integer.',
            'rating.min' => 'The rating must be at least 1.',
            'rating.max' => 'The rating may not be greater than 5.',

        ];
    }
}
