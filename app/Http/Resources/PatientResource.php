<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            "user" => $this->user,
            "mrn" => $this->mrn,
            "date_of_birth" => $this->date_of_birth,
            "gender" => $this->gender,
            "blood_group" => $this->blood_group,
            "address" => $this->address,
            "phone" => $this->phone,
            "emergency_contact_name" => $this->emergency_contact_name,
            "emergency_contact_phone" => $this->emergency_contact_phone,
            "emergency_contact_relationship" =>
                $this->emergency_contact_relationship,
        ];
    }
}
