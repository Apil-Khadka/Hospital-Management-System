<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage-lab");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "status" =>
                "nullable|string|in:ordered,sample_collected,processing,completed,cancelled",
            "notes" => "nullable|string",
        ];
    }
}
