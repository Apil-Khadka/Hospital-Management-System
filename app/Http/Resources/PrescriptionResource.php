<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

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
            'id' => $this->id,
            'details' => PrescriptionDetailResource::collection(
                $this->prescriptiondetails
            ),
            'diagnosis' => $this->diagnosis,
            'notes' => $this->notes,
        ];
    }
}
