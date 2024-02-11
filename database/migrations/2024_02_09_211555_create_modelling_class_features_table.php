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

        Schema::create('modelling_class_features', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->char('modellingclass_id', 8);
            $table->foreign('modellingclass_id')->references('id')->on('modelling_class');
            $table->unsignedSmallInteger('sort_nr');
            $table->char('feature_id', 8);
            $table->foreign('feature_id')->references('id')->on('feature');
            $table->unsignedTinyInteger('port_code');
            $table->char('drawing_code', 8);
            $table->foreignId('unit_id')->nullable();
            $table->char('imp_unit_id', 8)->nullable();
            $table->foreignId('modelling_class_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelling_class_features');
    }
};
