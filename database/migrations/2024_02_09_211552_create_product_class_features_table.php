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

        Schema::create('product_class_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_class_id')->index();
            $table->foreign('product_class_id')->references('id')->on('product_classes');
            $table->char('feature_id',8);
            $table->foreign('feature_id')->references('id')->on('features');
            $table->char('unit_id',8);
            $table->foreign('unit_id')->references('id')->on('units');
            $table->char('imp_unit_id',8);
            $table->foreign('imp_unit_id')->references('id')->on('units');
            $table->enum('changecode', ['Unchanged','Changed','New','Deleted'])->nullable();
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
