<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::factory()->count(200)->create();
    }
}
