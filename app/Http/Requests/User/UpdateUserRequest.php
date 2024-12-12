<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'is_email_2fa' => ['required', 'boolean'],
            'email_verified_at' => ['required', 'string'],
            'role' => ['required', 'string', Rule::in(User::$ROLES)],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_email_2fa' => $this->is_email_2fa ? 1 : 0,
            'email_verified_at' => $this->is_email_verified ? date('Y-m-d H:i:s') : '-',
        ]);
    }
}
