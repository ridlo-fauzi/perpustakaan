<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePenerbitRequest extends FormRequest
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
        $id_penerbit = $this->route('penerbit') ? $this->route('penerbit')->id_penerbit : null;

        return [
            'id_penerbit' => ['required', 'max:11', Rule::unique('penerbit')->ignore($id_penerbit, 'id_penerbit')->where(function ($query) use ($id_penerbit) {
                return $query->where('id_penerbit', '=', $id_penerbit);
            })],
            'nama_penerbit' => ['required', 'max:255']
        ];
    }
}
