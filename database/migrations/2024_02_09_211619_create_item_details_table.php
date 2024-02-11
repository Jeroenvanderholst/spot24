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

        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_item_number', 35)->unique();
            $table->foreign('supplier_item_number')->references('id')->on('trade_item');
            $table->enum('item_status', ["PRE-LAUNCH","ACTIVE","ON HOLD","PLANNED WITHDRAWAL","OBSOLETE"])->nullable();
            $table->enum('item_condition', ["NEW","USED","REFURBISHED"])->nullable();
            $table->boolean('stock_item')->nullable();
            $table->unsignedSmallInteger('shelf_life_period')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_details');
    }
};
