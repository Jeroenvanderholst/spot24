<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ModellingClassFeature;
use Illuminate\Database\Seeder;

class ModellingClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingClassFeature::factory()->count(5000)->create();
    }
}
