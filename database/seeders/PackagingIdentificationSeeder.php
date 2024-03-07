<?php

namespace Database\Seeders;

use App\Models\PackagingIdentification;
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
