<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => 'string|max:255',
            'address' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => ___('Kolom ini harus diisi.')
        ];
    }
}
