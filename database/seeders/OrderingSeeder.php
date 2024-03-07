<?php

namespace Database\Seeders;

use App\Models\Ordering;
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
