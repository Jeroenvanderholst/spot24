<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\Ordering;
use Illuminate\Database\Seeder;

class OrderingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ordering::factory()->count(5)->create();
    }
}
