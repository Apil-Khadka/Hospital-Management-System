<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

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
            'id' => $this->id,
            'patient' => PatientResource::make($this->patient),
            'doctor' => StaffResource::make($this->staff),
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'status' => $this->status,
            'type' => $this->type,
            'notes' => $this->notes,
            'prescriptions' => PrescriptionResource::collection($this->prescriptions),
            'laborders' => LabOrderResource::collection($this->labOrders),
            'billing' => BillResource::make($this->bill),
        ];
    }
}
