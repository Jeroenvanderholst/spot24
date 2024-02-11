<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory()->count(5)->create();
    }
}
