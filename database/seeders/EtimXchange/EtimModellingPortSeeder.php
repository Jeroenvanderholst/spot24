<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\EtimModellingPort;
use Illuminate\Database\Seeder;

class EtimModellingPortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtimModellingPort::factory()->count(5)->create();
    }
}
