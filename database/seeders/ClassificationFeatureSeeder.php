<?php

namespace Database\Seeders;

use App\Models\ClassificationFeature;
use Illuminate\Database\Seeder;

class ClassificationFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassificationFeature::factory()->count(5)->create();
    }
}
