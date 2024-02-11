<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Translation::factory()->count(5)->create();
    }
}
