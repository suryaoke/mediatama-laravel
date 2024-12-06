<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArtikelCreateRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('artikels', 'title')->whereNull('deleted_at'),
                'max:255',
            ],
            'content' => 'required',
            'foto' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png',
                'max:4096',
            ],
            'author_id' => 'required',
            'kategori_id' => 'required',
            'tag_id' => 'required'

        ];
    }
}
