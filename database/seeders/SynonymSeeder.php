<?php

namespace Database\Seeders;

use App\Models\Synonym;
use Illuminate\Database\Seeder;

class SynonymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Synonym::factory()->count(15000)->create();
    }
}
