<?php

namespace App\Observers;

use App\Models\BillItem;

class BillItemObserver
{
    /**
     * Handle the BillItem "created" event.
     */
    public function created(BillItem $billItem): void
    {
        //
    }
    // Before saving (creating or updating), calculate total_price
    public function saving(BillItem $billItem): void
    {
        if ($billItem->billable) {
            $billItem->total_price =
                $billItem->quantity * $billItem->billable->unit_price;
        }
    }

    // After saving (created or updated), update the bill's total_amount
    public function saved(BillItem $billItem): void
    {
        $billItem->bill->calculateTotalAmount();
    }

    /**
     * Handle the BillItem "updated" event.
     */
    public function updated(BillItem $billItem): void
    {
        //
    }

    /**
     * Handle the BillItem "deleted" event.
     */
    public function deleted(BillItem $billItem): void
    {
        $billItem->bill->calculateTotalAmount();
    }

    /**
     * Handle the BillItem "restored" event.
     */
    public function restored(BillItem $billItem): void
    {
        //
    }

    /**
     * Handle the BillItem "force deleted" event.
     */
    public function forceDeleted(BillItem $billItem): void
    {
        //
    }
}
