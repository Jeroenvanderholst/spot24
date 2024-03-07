<?php

namespace Database\Seeders;

use App\Models\ClassLink;
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
