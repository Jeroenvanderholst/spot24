<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ProductDescription;
use Illuminate\Database\Seeder;

class ProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductDescription::factory()->count(5)->create();
    }
}
