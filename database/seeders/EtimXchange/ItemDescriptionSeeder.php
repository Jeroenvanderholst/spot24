<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ItemDescription;
use Illuminate\Database\Seeder;

class ItemDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemDescription::factory()->count(5)->create();
    }
}
