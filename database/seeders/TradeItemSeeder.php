<?php

namespace Database\Seeders;

use App\Models\TradeItem;
use Illuminate\Database\Seeder;

class TradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TradeItem::factory()->count(5)->create();
    }
}
