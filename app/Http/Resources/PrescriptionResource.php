<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            "prescription" => PrescriptionDetailResource::collection(
                $this->prescriptiondetails
            ),
            "diagnosis" => $this->diagnosis,
            "notes" => $this->notes,
        ];
    }
}
