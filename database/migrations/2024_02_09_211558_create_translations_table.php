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
            $table->char('id', 8)->primary()->foreign('ProductClass.id');
            $table->char('language_id', 5);
            $table->foreign('language_id')->references('id')->on('language');
            $table->string('description', 80);
            $table->foreignId('product_class_id');
            $table->foreignId('feature_id');
            $table->foreignId('group_id');
            $table->foreignId('modelling_class_id');
            $table->foreignId('value_id');
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
