<?php

namespace Database\Seeders;

use App\Models\ClassRelease;
use App\Models\Release;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassRelease::factory()->count(2000)->create();

    }
}
