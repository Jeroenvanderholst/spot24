<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\PackagingIdentification;
use Illuminate\Database\Seeder;

class PackagingIdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackagingIdentification::factory()->count(5)->create();
    }
}
