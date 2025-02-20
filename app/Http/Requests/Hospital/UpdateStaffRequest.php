<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            "department_id" => "nullable|exists:departments,id",
            "specialization" => "nullable|string|max:255",
            "qualification" => "nullable|string|max:255",
            "experience_years" => "nullable|integer|min:0",
            "license_number" =>
                "nullable|string|max:100|unique:staff,license_number",
            "date_of_birth" => "nullable|date|before:today",
            "gender" => "nullable|in:male,female,other",
            "phone_number" =>
                "nullable|string|max:20|unique:staff,phone_number",
            "temporary_address" => "nullable|string|max:500",
            "permanent_address" => "nullable|string|max:500",
            "employment_status" =>
                "nullable|string|in:full-time,part-time,contract",
            "shift_details" => "nullable|string|max:255",
            "emergency_contact_name" => "nullable|string|max:255",
            "emergency_contact_relationship" => "nullable|string|max:100",
            "emergency_contact_phone" => "nullable|string|max:20",
        ];
    }
}
