<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage-appointments");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // "appointment_date" => "nullable|date|after_or_equal:today",
            // "appointment_time" => "nullable|date_format:H:i",
            "status" => "nullable|in:scheduled,completed,cancelled,no_show",
            // "type" => "required|in:routine,emergency,follow-up,consultation",
            "notes" => "nullable|string",
        ];
    }
}
