<?php

namespace Database\Seeders;

use App\Models\AllowanceSurcharge;
use Illuminate\Database\Seeder;

class AllowanceSurchargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AllowanceSurcharge::factory()->count(5)->create();
    }
}
