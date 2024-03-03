<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Closure;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('La contraseña actual no coincide.');
                }
            }],
            'new_password' => ['required', 'string', 'min:6']
        ];
    }
}
