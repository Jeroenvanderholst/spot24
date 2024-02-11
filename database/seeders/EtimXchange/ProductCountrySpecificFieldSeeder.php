<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ProductCountrySpecificField;
use Illuminate\Database\Seeder;

class ProductCountrySpecificFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCountrySpecificField::factory()->count(5)->create();
    }
}
