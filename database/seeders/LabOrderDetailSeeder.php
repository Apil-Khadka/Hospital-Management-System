<?php

namespace Database\Seeders;

use App\Models\LabOrder;
use App\Models\LabOrderDetail;
use App\Models\LabTest;
use Illuminate\Database\Seeder;

class LabOrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labtests = LabTest::pluck("id")->toArray();
        $laborders = LabOrder::pluck("id")->toArray();

        foreach ($laborders as $laborderid) {
            foreach ($labtests as $labtestid) {
                LabOrderDetail::create([
                    "lab_order_id" => $laborderid,
                    "lab_test_id" => $labtestid,
                    "result" => json_encode([
                        "title" => fake()->word(),
                        "description" => fake()->sentence(),
                        "value" => fake()->randomFloat(2, 0, 100), // Example test result
                    ]),
                    "result_date" => fake()->date,
                    "remarks" => fake()->sentence,
                ]);
            }
        }
    }
}
