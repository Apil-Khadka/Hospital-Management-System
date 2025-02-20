<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole("admin") ||
            $this->user()->hasRole("patient") ||
            $this->user()->patient()->id == $this->route("id");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "date_of_birth" => "nullable|date",
            "gender" => "nullable|string|max:255",
            "blood_group" => "nullable|string|max:255",
            "address" => "nullable|string|max:255",
            "phone" => "nullable|string|max:255",
            "emergency_contact_name" => "nullable|string|max:255",
            "emergency_contact_relationship" => "nullable|string|max:255",
            "emergency_contact_phone" => "nullable|string|max:255",
        ];
    }
}
