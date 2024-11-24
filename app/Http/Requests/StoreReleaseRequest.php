<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReleaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'version' => 'required|string|max:10|regex:/^\d+(\.\d+)+$/',
            'release_date' => 'required|date',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'link' => 'nullable|url|max:255',
        ];
    }
}
