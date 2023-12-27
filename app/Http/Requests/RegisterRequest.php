<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'unique:users,name', 'max:11'],
            'email' => ['required', 'unique:users,email', 'email:dns'],
            'password' => ['required', 'min:3', 'same:confPassword'],
            'confPassword' => ['required', 'min:3', 'same:password'],
            'no_hp' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'role' => ['required']
        ];
    }
}
