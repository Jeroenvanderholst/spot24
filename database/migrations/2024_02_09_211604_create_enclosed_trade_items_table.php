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

        Schema::create('enclosed_trade_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packaging_id')->index();
            $table->foreign('packaging_id')->references('id')->on('packaging_identification');
            $table->string('supplier_item_number', 35)->nullable();
            $table->string('manufacturer_item_number', 35)->nullable();
            $table->char('item_gtin', 14)->nullable();
            $table->unsignedSmallInteger('enclosed_item_quantity')->default(1);
            $table->foreignId('packaging_identification_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enclosed_trade_items');
    }
};
