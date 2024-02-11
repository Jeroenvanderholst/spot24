<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\EtimModellingFeature;
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
