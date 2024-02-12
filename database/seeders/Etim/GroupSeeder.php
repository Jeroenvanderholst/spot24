<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()->count(213)->create();
    }
}
