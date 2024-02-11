<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\OtherClassification;
use Illuminate\Database\Seeder;

class OtherClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OtherClassification::factory()->count(5)->create();
    }
}
