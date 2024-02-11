<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\LcaDeclaration;
use Illuminate\Database\Seeder;

class LcaDeclarationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LcaDeclaration::factory()->count(5)->create();
    }
}
