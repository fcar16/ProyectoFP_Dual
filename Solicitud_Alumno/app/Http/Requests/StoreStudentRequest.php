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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1',
            'dni' => 'required|string|max:9|unique:students,dni',
            'CV' => 'required|string',
            'group' => 'required|in:1-ASIR,2-ASIR,1-DAW,2-DAW,1-DAM,2-DAM',
            'course' => 'required|in:24/25,25/26,26/27',
        ];
    }
}
