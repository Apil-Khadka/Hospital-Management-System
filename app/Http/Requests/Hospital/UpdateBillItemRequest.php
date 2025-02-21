<?php

namespace App\Http\Requests\Hospital;

use App\Rules\ValidBillable;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBillItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo("manage-billing");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "billable_id" => ["required", new ValidBillable()],
            "billable_type" => "required|in:labtest,medication",
            "quantity" => "nullable|numeric|min:1",
            "status" => "nullable|in:pending,paid,cancelled",
        ];
    }
}
