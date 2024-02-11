<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ProductRelation;
use Illuminate\Database\Seeder;

class ProductRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductRelation::factory()->count(5)->create();
    }
}
