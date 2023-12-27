<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnggotaRequest extends FormRequest
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
        $id_anggota = $this->route('anggota') ? $this->route('anggota')->id_anggota : null;
        return [
            'id_anggota' => ['required', 'max:11', Rule::unique('anggota')->ignore($id_anggota, 'id_anggota')->where(function ($query) use ($id_anggota) {
                return $query->where('id_anggota', '=', $id_anggota);
            })],
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'email:dns'],
            'notelp' => ['required', 'max:15'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required', 'max:100'],
        ];
    }
}
