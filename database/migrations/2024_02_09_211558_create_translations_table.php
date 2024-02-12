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

        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->char('entity_id', 8)->index();
            $table->char('language_id', 5)->index();
            $table->foreign('language_id')->references('id')->on('etim_languages');
            $table->string('description', 80);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
