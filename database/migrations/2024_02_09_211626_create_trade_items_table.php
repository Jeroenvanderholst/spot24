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

        Schema::create('trade_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('supplier_item_number', 35)->index();
            $table->char('supplier_item_gtin', 14)->unique()->nullable();
            $table->string('manufacturer_product_nr', 35)->index();
            $table->string('supplier_alt_item_number', 35)->nullable();
            $table->string('manufacturer_item_number', 35)->nullable();
            $table->char('manufacturer_item_gtin', 14)->nullable();
            $table->string('buyer_item_number', 35)->nullable();
            $table->date('item_validity_date')->nullable();
            $table->date('item_obslescence_date')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_items');
    }
};
