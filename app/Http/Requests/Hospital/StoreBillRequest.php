<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("create-bill") ||
            $this->user()->hasPermissionTo("manage-billing");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "appointment_id" =>
                "required|unique:bills,appointment_id|exists:appointments,id",
            "paid_amount" => "required|numeric|min:0",
            "payment_method" => "required|in:cash,card,insurance,online",
        ];
    }
}
