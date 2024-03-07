<?php

namespace Database\Seeders;

use App\Models\ModellingGroup;
use Illuminate\Database\Seeder;

class ModellingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingGroup::factory()->count(50)->create();
        ModellingGroup::create(
            [
                'id' => 'MG000001',
                'description' => 'Connection Types',
                'deprecated' => false,

            ]
        );
    }
}
