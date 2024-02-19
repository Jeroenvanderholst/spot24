<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\FeatureValue;
use Illuminate\Database\Seeder;

class FeatureValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureValue::factory()->count(4000)->create();
    }
}
