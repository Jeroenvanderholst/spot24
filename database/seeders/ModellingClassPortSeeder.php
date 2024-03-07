<?php

namespace Database\Seeders;

use App\Models\ModellingClassPort;
use Illuminate\Database\Seeder;

class ModellingClassPortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingClassPort::factory()->count(2000)->create();
    }
}
