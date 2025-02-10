<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiCompanyRequest extends FormRequest
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
            'name' => 'required|max:255|min:3', // pedimos un mínimo, máximo y que sea requerido el título
            'website' => 'nullable|max:255|min:3' // pedimos un mínimo y máximo, pero el contenido es opcional
        ];
    }
}
