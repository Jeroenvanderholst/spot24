<?php

namespace Database\Seeders;

use App\Models\ItemDetail;
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
