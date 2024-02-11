<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\Legislation;
use Illuminate\Database\Seeder;

class LegislationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Legislation::factory()->count(5)->create();
    }
}
