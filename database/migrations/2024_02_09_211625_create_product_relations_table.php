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

        Schema::create('product_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('related_manufacturer_product_number', 35)->index();
            $table->char('related_manufacturer_product_gtin', 14)->nullable();
            $table->enum('relation_type', ["ACCESSORY","MAIN_PRODUCT","CONSISTS_OF","CROSS-SELLING","MANDATORY","SELECT","SIMILAR","SPAREPART","UPSELLING","SUCCESSOR","PREDECESSOR","OTHER"]);
            $table->unsignedMediumInteger('related_product_quantity')->default(1);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_relations');
    }
};
