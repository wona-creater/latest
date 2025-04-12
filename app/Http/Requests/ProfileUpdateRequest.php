<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'home_address' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'document_type' => ['nullable', 'in:drivers_license,government_id,passport'],
            'document_image' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'], // 2MB max
            'country' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'], // 2MB max
            'kyc_status' => ['sometimes', 'in:pending,verified,rejected'],
        ];
    }
}
