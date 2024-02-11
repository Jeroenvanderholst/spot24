<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\EnclosedTradeItem;
use Illuminate\Database\Seeder;

class EnclosedTradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnclosedTradeItem::factory()->count(5)->create();
    }
}
