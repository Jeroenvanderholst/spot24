<?php

namespace Database\Seeders;

use App\ModelsValueMatrix;
use Illuminate\Database\Seeder;

class EtimValueMatrixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimValueMatrix::factory()->count(5)->create();
    }
}
