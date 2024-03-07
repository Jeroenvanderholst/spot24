<?php

namespace Database\Seeders;

use App\Models\ProductAttachment;
use Illuminate\Database\Seeder;

class ProductAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttachment::factory()->count(5)->create();
    }
}
