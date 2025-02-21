<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\BillItem;
use App\Models\LabTest;
use App\Models\Medication;
use Illuminate\Database\Seeder;

class BillItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve or create a Bill record for seeding

        // Seed bill items for each LabTest
        $labTests = LabTest::all();
        foreach ($labTests as $labTest) {
            $quantity = rand(1, 3);
            // Calculate total price using the unit_price from the LabTest model

            BillItem::create([
                "bill_id" => 1,
                "billable_id" => $labTest->id,
                "billable_type" => LabTest::class,
                "quantity" => $quantity,
                "status" => "pending",
            ]);
        }

        // Seed bill items for each Medication
        $medications = Medication::all();
        foreach ($medications as $medication) {
            $quantity = rand(1, 5);

            BillItem::create([
                "bill_id" => 1,
                "billable_id" => $medication->id,
                "billable_type" => Medication::class,
                "quantity" => $quantity,
                "status" => "pending",
            ]);
        }
    }
}
