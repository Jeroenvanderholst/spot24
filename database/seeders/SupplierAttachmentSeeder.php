<?php

namespace Database\Seeders;

use App\Models\SupplierAttachment;
use Illuminate\Database\Seeder;

class SupplierAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupplierAttachment::factory()->count(5)->create();
    }
}
