<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            "patient" => PatientResource::make($this->patient),
            "doctor" => StaffResource::make($this->staff),
            "appointment_date" => $this->appointment_date,
            "appointment_time" => $this->appointment_time,
            "status" => $this->status,
            "type" => $this->type,
            "notes" => $this->notes,
        ];
    }
}
