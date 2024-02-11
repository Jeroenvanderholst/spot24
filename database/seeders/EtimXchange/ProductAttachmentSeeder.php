<?php

namespace Database\Seeders\EtimXchange;

use App\Models\EtimXchange\ProductAttachment;
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
