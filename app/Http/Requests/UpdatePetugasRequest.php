<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UpdatePetugasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make  his request.
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
        $id_user = $this->route('petugas') ? $this->route('petugas')->id_user : null;
        return [
            'id_user' => ['required', 'max:11', Rule::unique('users')->ignore($id_user, 'id_user')->where(function ($query) use ($id_user) {
                return $query->where('id_user', '=', $id_user);})],
            'name' => ['required', 'max:255'],
            'email' => ['required','max:100'],
            'password' => ['max:100'],
            'no_hp' => ['required', 'max:15'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required', 'max:100'],
            'role' => ['required', 'in:admin,bagPeminjaman,bagPengelolaanBuku'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Hash the password before validation
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
    }
}
