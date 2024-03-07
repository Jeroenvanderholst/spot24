<?php

namespace Database\Seeders;

use App\Models\ClassFeature;
use Illuminate\Database\Seeder;

class ClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassFeature::factory()->count(15000)->create();
    }
}
