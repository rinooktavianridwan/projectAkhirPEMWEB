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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['required', 'string', 'max:15'], // adjust validation rules as needed
            'address' => ['required', 'string', 'max:255'], // adjust validation rules as needed
            'city' => ['required', 'string', 'max:255'], // adjust validation rules as needed
            'country' => ['required', 'string', 'max:255'], // adjust validation rules as needed
            'postal_code' => ['required', 'string', 'max:10'], // adjust validation rules as needed
        ];
    }
}
