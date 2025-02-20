<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            "user_id" => "required|unique:staff,user_id|exists:users,id",
            "department_id" => "required|exists:departments,id",
            "specialization" => "required|string|max:255",
            "qualification" => "required|string|max:255",
            "experience_years" => "required|integer|min:0",
            "license_number" =>
                "nullable|string|max:100|unique:staff,license_number",
            "date_of_birth" => "required|date|before:today",
            "gender" => "required|in:male,female,other",
            "phone_number" =>
                "nullable|string|max:20|unique:staff,phone_number",
            "temporary_address" => "nullable|string|max:500",
            "permanent_address" => "required|string|max:500",
            "employment_status" =>
                "required|string|in:full-time,part-time,contract",
            "shift_details" => "nullable|string|max:255",
            "emergency_contact_name" => "required|string|max:255",
            "emergency_contact_relationship" => "nullable|string|max:100",
            "emergency_contact_phone" => "nullable|string|max:20",
        ];
    }
}
