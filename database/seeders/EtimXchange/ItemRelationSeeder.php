<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ItemRelation;
use Illuminate\Database\Seeder;

class ItemRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemRelation::factory()->count(5)->create();
    }
}
