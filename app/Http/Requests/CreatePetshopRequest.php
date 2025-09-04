<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePetshopRequest extends FormRequest
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

            // PROFILE
            'document' => 'required|string|max:20',
            'responsable_name' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'zip_code' => 'required|string',
            'uf' => 'required|string|max:2',
            'city' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'neighboorhood' => 'required|string',
            'hour_open' => 'required',
            'hour_close' => 'required',
            'working_days' => 'required|array',
            'description' => 'nullable|string',

            // SERVICES
            'services' => 'nullable|array',
            'services.*.name' => 'required|string',
            'services.*.price' => 'required|numeric|min:0',
            'services.*.duration_minutes' => 'required|integer|min:1',
            'services.*.available_days' => 'required|array',
            'services.*.start_time' => 'required',
            'services.*.end_time' => 'required',
        ];
    }
}
