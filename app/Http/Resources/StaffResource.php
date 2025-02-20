<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_name" =>
                $this->user->firstname . " " . $this->user->lastname ?? "N/A",
            "department_name" => $this->department->name ?? "N/A",
            "specialization" => $this->specialization,
            "qualification" => $this->qualification,
            "experience_years" => $this->experience_years,
            "license_number" => $this->license_number,
            "date_of_birth" => $this->date_of_birth,
            "gender" => $this->gender,
            "phone_number" => $this->phone_number,
            "temporary_address" => $this->temporary_address,
            "permanent_address" => $this->permanent_address,
            "employment_status" => $this->employment_status,
            "shift_details" => $this->shift_details,
            "emergency_contact_name" => $this->emergency_contact_name,
            "emergency_contact_relationship" =>
                $this->emergency_contact_relationship,
            "emergency_contact_phone" => $this->emergency_contact_phone,
        ];
    }
}
