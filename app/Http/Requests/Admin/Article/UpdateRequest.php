<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image'],
            'title' => ['required', 'string', 'max:255', Rule::unique('articles', 'title')->ignore($this->article)],
            'content' => ['required'],
            'category_id' => ['required'],
        ];
    }
}
