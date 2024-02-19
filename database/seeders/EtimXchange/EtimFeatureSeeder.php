<?php

namespace Database\Seeders\Etim;

use App\Models\EtimXchange\EtimFeature;
use Illuminate\Database\Seeder;

class EtimFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimFeature::factory()->count(10)->create();
    }
}
