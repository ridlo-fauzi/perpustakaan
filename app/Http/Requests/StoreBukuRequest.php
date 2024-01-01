<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
            'isbn' => ['required', 'unique:buku,isbn', 'max:255'],
            'judul' => ['required'],
            'sinopsis' => ['required'],
            'tahun_terbit' => ['required'],
            'id_category' => ['required'],
            'nama_penulis' => ['required'],
            'id_penerbit' => ['required'],
            'id_rak' => ['required'],
            'jumlah_halaman' => ['required']
        ];
    }
}
