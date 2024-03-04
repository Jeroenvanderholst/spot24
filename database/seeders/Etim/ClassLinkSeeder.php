<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ClassLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassLink::factory()->count(1000)->create();
    }
}
