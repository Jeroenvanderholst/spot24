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

        Schema::create('packaging_identifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_item');
            $table->string('supplier_packaging_number', 35)->nullable();
            $table->string('manufacturer_packaging_number', 35)->nullable();
            $table->char('manufacturer_packaging_gtin_3', 14)->nullable();
            $table->enum('packaging_type_code', ["BE","BG","BJ","BO","BR","BX","C62","CA","CL","CQ","CR","CS","CT","CY","D99","DR","EV","KG","NE","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SET","TN","TU","WR","Z2","Z3"]);
            $table->unsignedDecimal('packaging_quantity', 16, 4)->nullable();
            $table->boolean('trade_item_primary_packaging')->nullable();
            $table->string('packaging_gs1_code128', 48)->nullable();
            $table->boolean('packaging_recyclable')->nullable();
            $table->boolean('packaging_reusable')->nullable();
            $table->boolean('packaging_break')->nullable();
            $table->unsignedTinyInteger('number_of_packaging_parts')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packaging_identifications');
    }
};
