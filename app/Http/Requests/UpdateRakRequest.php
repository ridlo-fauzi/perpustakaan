<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRakRequest extends FormRequest
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
        $id_rak = $this->route('rak') ? $this->route('rak')->id_rak : null;

        return [
            'id_rak' => ['required', 'max:11', Rule::unique('rak')->ignore($id_rak, 'id_rak')->where(function ($query) use ($id_rak) {
                return $query->where('id_rak', '=', $id_rak);
            })],
            'nama_rak' => ['required', 'max:255'],
        ];
    }
}
