<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenerbitRequest extends FormRequest
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
            'id_penerbit' => ['required', 'unique:penerbit,id_penerbit', 'max:11'],
            'nama_penerbit' => ['required', 'max:11']
        ];
    }
}
