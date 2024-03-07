<?php

namespace Database\Seeders;

use App\Models\ProductRelation;
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
