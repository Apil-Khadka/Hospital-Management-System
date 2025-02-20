<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionDetailResource extends JsonResource
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
            "medication" => MedicationResource::make($this->medication),
            "dosage" => $this->dosage,
            "frequency" => $this->frequency,
            "duration" => $this->duration,
            "instructions" => $this->instructions,
        ];
    }
}
