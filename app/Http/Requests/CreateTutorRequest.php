<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTutorRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'telephone' => 'nullable|string',
            'document' => 'required|string|min:11',
            'address.zip_code' => 'required|string|max:9',
            'address.uf' => 'required|string|size:2',
            'address.city' => 'required|string|max:255',
            'address.street' => 'required|string|max:255',
            'address.number' => 'nullable|string|max:20',
            'address.neighborhood' => 'nullable|string|max:255',
            'pets' => 'nullable|array',
            'pets.*.name' => 'required_with:pets.*|string|max:255',
            'pets.*.breed' => 'nullable|string|max:255',
            'pets.*.age' => 'nullable|integer|max:30',
            'pets.*.size' => 'nullable|string',
            'pets.*.weight' => 'nullable|numeric',
            'pets.*.height' => 'nullable|numeric',
            'pets.*.type' => 'nullable|string',
            'pets.*.image' => 'nullable|string|max:2048',
        ];
    }
}
