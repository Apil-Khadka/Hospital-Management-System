<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage-users") ||
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
            "name" => "nullable|unique:departments,name,id|string|max:255",
            "description" => "nullable|string|max:255",
            "contact_number" => "nullable|string|max:255",
            "email" => "nullable|email|max:255",
            "location" => "nullable|string|max:255",
        ];
    }
}
