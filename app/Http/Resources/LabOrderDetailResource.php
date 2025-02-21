<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LabOrderDetailResource extends JsonResource
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
            "labtest" => LabTestResource::make($this->labTest),
            "result" => $this->result,
            "result_date" => $this->result_date,
            "remarks" => $this->remarks,
        ];
    }
}
