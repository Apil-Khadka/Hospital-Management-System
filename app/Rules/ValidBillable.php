<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Relations\Relation;

class ValidBillable implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail
    ): void {
        // Retrieve billable_type from the request
        $billableType = request("billable_type");

        // Get the morph map
        $morphMap = Relation::morphMap();

        // Check if the billable_type is valid
        if (!array_key_exists($billableType, $morphMap)) {
            $fail("The selected billable type is invalid.");
            return;
        }

        // Get the corresponding model
        $model = $morphMap[$billableType];

        // Check if the billable_id exists in the corresponding model's table
        if (!$model::where("id", $value)->exists()) {
            $fail("The selected billable ID is invalid.");
        }
    }
}
