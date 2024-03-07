<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => ['required', 'image'],
            'title' => ['required', 'string', 'max:255', 'unique:articles,title'],
            'content' => ['required'],
            'category_id' => ['required'],
        ];
    }
}
