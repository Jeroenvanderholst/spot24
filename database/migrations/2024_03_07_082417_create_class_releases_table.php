<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void


    {
        Schema::disableForeignKeyConstraints();

        Schema::create('class_releases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_class_id')->constrained();
            $table->foreignId('release_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_releases');
    }
};
