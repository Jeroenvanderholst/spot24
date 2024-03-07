<?php

namespace Database\Seeders;

use App\Models\UnitTranslation;
use Illuminate\Database\Seeder;

class UnitTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitTranslation::factory()->count(400)->create();
    }
}
