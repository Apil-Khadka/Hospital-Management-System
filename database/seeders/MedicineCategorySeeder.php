<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class MedicineCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Analgesics",
                "description" => "Medications that relieve pain.",
            ],
            [
                "name" => "Antibiotics",
                "description" => "Drugs that combat bacterial infections.",
            ],
            [
                "name" => "Antidepressants",
                "description" =>
                    "Medications used to treat depressive disorders.",
            ],
            [
                "name" => "Antidiabetics",
                "description" => "Drugs used to manage diabetes mellitus.",
            ],
            [
                "name" => "Antihypertensives",
                "description" => "Medications that help lower blood pressure.",
            ],
            [
                "name" => "Antivirals",
                "description" => "Drugs that treat viral infections.",
            ],
            [
                "name" => "Cardiovascular Agents",
                "description" =>
                    "Medications affecting the heart and blood vessels.",
            ],
            [
                "name" => "Gastrointestinal Agents",
                "description" => "Drugs that treat digestive system disorders.",
            ],
            [
                "name" => "Hormones and Modifiers",
                "description" => "Substances that regulate bodily functions.",
            ],
            [
                "name" => "Psychotherapeutic Agents",
                "description" =>
                    "Medications used in the treatment of mental health disorders.",
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
