<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole("admin") ||
            $this->user()->hasRole("patient");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "user_id" => "required|unique:patients,user_id|exists:users,id",
            "date_of_birth" => "required|date",
            "gender" => "required|string",
            "blood_group" => "required|string|max:3",
            "address" => "required|string",
            "phone" => "required|string",
            "emergency_contact_name" => "required|string",
            "emergency_contact_relationship" => "required|string",
            "emergency_contact_phone" => "required|string",
        ];
    }
}
