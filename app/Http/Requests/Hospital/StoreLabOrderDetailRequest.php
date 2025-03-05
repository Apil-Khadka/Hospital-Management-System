<?php

namespace App\Http\Requests\Hospital;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabOrderDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('manage-lab') ||
            $this->user()->hasPermissionTo('create-lab-order');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lab_order_id' => 'required|exists:lab_orders,id',
            'lab_test_id' => 'required|exists:lab_tests,id',
            'result' => 'nullable|string',
            'result_date' => 'nullable|date',
            'remarks' => 'nullable|string',
        ];
    }
}
