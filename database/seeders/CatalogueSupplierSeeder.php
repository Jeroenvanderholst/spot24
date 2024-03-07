<?php

namespace Database\Seeders;

use App\Models\CatalogueSupplier;
use Illuminate\Database\Seeder;

class CatalogueSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CatalogueSupplier::factory()->count(5)->create();
    }
}
