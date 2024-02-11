<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ModellingClass;
use Illuminate\Database\Seeder;

class ModellingClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingClass::factory()->count(5)->create();
    }
}
