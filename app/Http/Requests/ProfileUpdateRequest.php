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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Optional image upload
            'first_name' => 'string|max:50',
            'last_name' => 'string|max:50',
            'email' => 'email', // Ignore current user's email

            'current_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed', // 'confirmed' ensures it matches `password_confirmation`
        ];
    }
}
