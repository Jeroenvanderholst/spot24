<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ItemDetail;
use Illuminate\Database\Seeder;

class ItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemDetail::factory()->count(5)->create();
    }
}
