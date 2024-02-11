<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductDetail::factory()->count(5)->create();
    }
}
