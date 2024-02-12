<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::factory()->count(2000)->create();
    }
}
