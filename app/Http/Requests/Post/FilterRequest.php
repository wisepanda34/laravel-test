<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sort_by' => 'nullable|string|in:title,updated_at',
            'sort_order' => 'nullable|string|in:asc,desc',
            'page' => '',
            'per_page' => ''
        ];
    }
}
