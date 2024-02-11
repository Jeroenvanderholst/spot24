<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\EtimValueMatrix;
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
