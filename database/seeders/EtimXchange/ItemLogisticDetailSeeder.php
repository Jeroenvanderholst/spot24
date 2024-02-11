<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ItemLogisticDetail;
use Illuminate\Database\Seeder;

class ItemLogisticDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemLogisticDetail::factory()->count(5)->create();
    }
}
