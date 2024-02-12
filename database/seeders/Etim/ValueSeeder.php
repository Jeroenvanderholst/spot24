<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\Value;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::factory()->count(1800)->create();
    }
}
