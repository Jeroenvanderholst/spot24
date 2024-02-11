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

        Schema::create('feature_values', function (Blueprint $table) {
            $table->id();
            $table->char('class_id', 8)->index();
            $table->unsignedTinyInteger('sort_nr');
            $table->char('feature_id', 8)->index();
            $table->foreign('feature_id')->references('feature_id')->on('modelling_class_feature');
            $table->char('value_id', 8)->index();
            $table->foreign('value_id')->references('id')->on('value');
            $table->string('changecode', 80)->nullable();
            $table->json('releases')->nullable();
            $table->foreignId('class_feature_id');
            $table->foreignId('modelling_class_feature_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_values');
    }
};
