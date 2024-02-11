<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ModellingGroup;
use Illuminate\Database\Seeder;

class ModellingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingGroup::factory()->count(5)->create();
    }
}
