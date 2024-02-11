<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\PackagingDetail;
use Illuminate\Database\Seeder;

class PackagingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackagingDetail::factory()->count(5)->create();
    }
}
