<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\LcaEnvironmental;
use Illuminate\Database\Seeder;

class LcaEnvironmentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LcaEnvironmental::factory()->count(5)->create();
    }
}
