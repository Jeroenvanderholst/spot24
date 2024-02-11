<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ModellingClassPort;
use Illuminate\Database\Seeder;

class ModellingClassPortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingClassPort::factory()->count(5)->create();
    }
}
