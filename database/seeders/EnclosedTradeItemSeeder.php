<?php

namespace Database\Seeders;

use App\Models\EnclosedTradeItem;
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
