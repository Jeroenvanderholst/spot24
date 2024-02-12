<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ProductClass;
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
