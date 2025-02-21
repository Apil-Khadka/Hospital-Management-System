<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Bill;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointment = Appointment::pluck("id")->toArray();

        foreach ($appointment as $id) {
            Bill::create([
                "appointment_id" => $id,
                "paid_amount" => 0,
                "payment_method" => fake()->randomElement([
                    "cash",
                    "card",
                    "insurance",
                    "online",
                ]),
            ]);
        }
    }
}
