<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Medication;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->pluck("id")->toArray();

        foreach ($categories as $categoryId) {
            Medication::create([
                "generic_name" => fake()->sentence,
                "category_id" => $categoryId,
                "unit_price" => fake()->randomFloat(2, 1, 100),
            ]);
        }
    }
}
