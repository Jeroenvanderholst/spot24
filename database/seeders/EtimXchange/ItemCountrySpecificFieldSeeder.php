<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ItemCountrySpecificField;
use Illuminate\Database\Seeder;

class ItemCountrySpecificFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemCountrySpecificField::factory()->count(5)->create();
    }
}
