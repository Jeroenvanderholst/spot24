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
            $table->id();
            $table->char('modellingclass_id', 8)->index();
            $table->foreign('modellingclass_id')->references('modelling_class_id')->on('modelling_classes');
            $table->unsignedSmallInteger('sort_nr');
            $table->char('feature_id', 8)->index();
            $table->foreign('feature_id')->references('id')->on('features');
            $table->unsignedTinyInteger('port_code');
            $table->char('drawing_code', 8);
            $table->char('unit_id', 8)->index()->nullable();
            $table->foreign('unit_id')->references('unit_id')->on('units');
            $table->char('imp_unit_id', 8)->index()->nullable();
            $table->foreign('imp_unit_id')->references('unit_id')->on('units');
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
