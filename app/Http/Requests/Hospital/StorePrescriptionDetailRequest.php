<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage-prescriptions");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "prescription_id" => "required|exists:prescriptions,id",
            "medication_id" => "required|exists:medications,id",
            "dosage" => "required|string|max:255",
            "frequency" => "required|string|max:255",
            "duration" => "required|string|max:255",
            "instructions" => "nullable|string|max:255",
        ];
    }
}
