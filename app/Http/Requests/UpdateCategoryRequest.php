<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $id_category = $this->route('category') ? $this->route('category')->id_category : null;

        return [
            'id_category' => ['required', 'max:11', Rule::unique('category')->ignore($id_category, 'id_category')->where(function ($query) use ($id_category) {
                return $query->where('id_category', '=', $id_category);
            })],
            'nama_category' => ['required', 'max:255'],
            'deskripsi' => ['required']
        ];
    }
}
