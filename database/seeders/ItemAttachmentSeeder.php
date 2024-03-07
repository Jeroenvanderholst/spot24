<?php

namespace Database\Seeders;

use App\Models\ItemAttachment;
use Illuminate\Database\Seeder;

class ItemAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemAttachment::factory()->count(5)->create();
    }
}
