<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ubah menjadi true jika Anda ingin melakukan validasi
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'manager_id' => [
                'required',
                'integer', // Tipe data harus integer
                'exists:manager,id', // Memastikan manager_id ada dalam tabel managers
            ],
            'name_project' => 'required|string|max:255',
            'category_id',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
