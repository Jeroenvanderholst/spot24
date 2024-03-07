<?php

namespace Database\Seeders;

use App\Models\ProductClass;
use Illuminate\Database\Seeder;

class ProductClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductClass::factory()->count(1000)->create();
    }
}
