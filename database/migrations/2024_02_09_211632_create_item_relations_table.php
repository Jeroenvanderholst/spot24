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

        Schema::create('item_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_items');
            $table->string('related_supplier_item_number', 35);
            $table->foreign('related_supplier_item_number')->references('supplier_item_number')->on('trade_items');
            $table->string('related_manufacturer_item_number', 35)->nullable();
            $table->char('related_item_gtin', 14)->nullable();
            $table->enum('relation_type', ["ACCESSORY","MAIN_PRODUCT","CONSISTS_OF","CROSS-SELLING","MANDATORY","SELECT","SIMILAR","SPAREPART","UPSELLING","SUCCESSOR","PREDECESSOR","OTHER"]);
            $table->unsignedMediumInteger('related_item_quantity')->default(1);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_relations');
    }
};
