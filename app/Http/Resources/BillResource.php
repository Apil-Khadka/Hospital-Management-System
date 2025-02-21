<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            "billItems" => BillItemResource::collection($this->billItems),
            "total_amount" => $this->total_amount,
            "paid_amount" => $this->paid_amount,
            "status" => $this->status,
            "payment_method" => $this->payment_method,
        ];
    }
}
