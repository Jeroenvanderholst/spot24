<?php

namespace Database\Seeders;

use App\Models\Release;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Release::insert([
            ['description' => 'ETIM-7.0'],
            ['description' => 'ETIM-8.0'],
            ['description' => 'ETIM-9.0'],
          

        ]);   
    }
}
