<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('authors', 'name')->whereNull('deleted_at')->ignore($this->route('author')),
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('authors')->whereNull('deleted_at')->ignore($this->route('author')),
                'max:255'
            ],
        ];
    }
}
