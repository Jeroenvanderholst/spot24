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

        Schema::create('etim_classifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unique();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('manufacturer_product_nr', 35)->index();
            $table->string('etim_release_version', 7);
            $table->date('etim_dynamic_release_date')->nullable();
            $table->char('etim_class_id', 8)->index();
            $table->foreign('etim_class_id')->references('class_id')->on('etim\_product_class');
            $table->unsignedTinyInteger('etim_class_version');
            $table->char('etim_modelling_class_id', 8)->index();
            $table->foreign('etim_modelling_class_id')->references('etim_modelling_class_id')->on('etim\modelling_class');
            $table->unsignedTinyInteger('etim_modelling_class_version')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etim_classifications');
    }
};
