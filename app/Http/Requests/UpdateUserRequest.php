<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage users") ||
            $this->user()->id == $this->route("id");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "firstname" => "nullable|string|max:255",
            "lastname" => "nullable|string|max:255",
            "email" => "nullable|email|max:255|unique:users,email",
            "password" => "nullable|string|min:8|max:255",
        ];
    }
}
