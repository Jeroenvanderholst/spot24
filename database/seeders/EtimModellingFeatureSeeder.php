<?php

namespace Database\Seeders;

use App\ModelsModellingFeature;
use Illuminate\Database\Seeder;

class EtimModellingFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimModellingFeature::factory()->count(5)->create();
    }
}
