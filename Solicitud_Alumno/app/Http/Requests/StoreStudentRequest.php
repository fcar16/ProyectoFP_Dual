<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
    public function rules()
    {
        return [
            'dni' => 'required|string|min:9',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'CV' => 'nullable|file|mimes:pdf|max:2048',
            'group' => 'required|string|max:255',
            'course' => 'required|string|max:255',
        ];
    }
}
