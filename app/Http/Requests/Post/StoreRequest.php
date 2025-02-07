<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'likes' => 'nullable|integer|min:0',
            'is_published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'achievements' => 'array',
            'achievements.*' => 'exists:achievements,id',
        ];
    }
}
