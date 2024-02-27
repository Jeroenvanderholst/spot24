<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\Catalogue;
use Illuminate\Database\Seeder;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catalogue::factory()->count(2)->create();
    }
}
