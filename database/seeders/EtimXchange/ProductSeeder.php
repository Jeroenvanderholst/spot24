<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(5)->create();
    }
}
