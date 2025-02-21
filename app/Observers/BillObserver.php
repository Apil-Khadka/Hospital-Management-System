<?php

namespace App\Observers;

use App\Models\Bill;
use Exception;

class BillObserver
{
    public function saving(Bill $bill): void
    {
        if ($bill->paid_amount > $bill->total_amount) {
            throw new Exception("Paid amount cannot exceed total amount.");
        }

        if ($bill->status !== "cancelled") {
            if ($bill->paid_amount == $bill->total_amount) {
                $bill->status = "paid";
            } elseif ($bill->paid_amount > 0) {
                $bill->status = "partial";
            } else {
                $bill->status = "pending";
            }
        }
    }

    public function created(Bill $bill): void
    {
        // Additional logic for created event
        $bill->total_amount = 0;
    }
}
