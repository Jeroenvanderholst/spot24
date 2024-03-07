<?php

namespace Database\Seeders;

use App\Models\ProductCountrySpecificField;
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
