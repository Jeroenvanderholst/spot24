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

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->char('manufacturer_id_gln', 13)->nullable();
            $table->char('manufacturer_id_duns', 9)->nullable();
            $table->string('manufacturer_name', 80);
            $table->string('manufacturer_shortname', 15)->nullable();
            $table->string('manufacturer_product_number', 35)->index();
            $table->json('product_gtin')->unique();
            $table->boolean('unbranded_product')->nullable();
            $table->string('brand_name', 50)->nullable();
            $table->json('brand_series')->nullable();
            $table->json('brand_series_variation')->nullable();
            $table->date('product_validity_date')->nullable();
            $table->date('product_obsolescence_date')->nullable();
            $table->string('customs_commodity_code', 10)->nullable();
            $table->unsignedDecimal('factor_customs_commodity_codedecimal(15,4)', 15, 4)->nullable();
            $table->char('country_of_origin', 2)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
