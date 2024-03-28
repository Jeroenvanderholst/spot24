<?php

namespace Database\Seeders;

use App\Models\ProductClassFeature;
use Illuminate\Database\Seeder;

class ProductClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductClassFeature::factory()->count(15000)->create();
    }
}
