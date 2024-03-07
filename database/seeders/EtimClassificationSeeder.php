<?php

namespace Database\Seeders;

use App\ModelsClassification;
use Illuminate\Database\Seeder;

class EtimClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimClassification::factory()->count(5)->create();
    }
}
