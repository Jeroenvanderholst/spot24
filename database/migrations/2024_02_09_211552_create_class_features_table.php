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

        Schema::create('class_features', function (Blueprint $table) {
            $table->id();
            $table->char('class_id', 8)->index();
            $table->foreign('class_id')->references('class_id')->on('product_classes');
            $table->unsignedSmallInteger('sort_nr');
            $table->char('feature_id', 8);
            $table->foreign('feature_id')->references('id')->on('features');
            $table->char('unit_id', 8)->nullable();
            $table->foreign('unit_id')->references('unit_id')->on('units');
            $table->char('imp_unit_id', 8)->nullable();
            $table->foreign('imp_unit_id')->references('unit_id')->on('units');
            $table->enum('changecode', ['Unchanged','Changed','New','Deleted'])->nullable();
            $table->json('releases')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_features');
    }
};
