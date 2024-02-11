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

        Schema::create('product_country_specific_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('product_number', 35)->index();
            $table->string('cs_product_characteristic_code', 6);
            $table->json('cs_product_characteristic_name')->nullable();
            $table->boolean('cs_product_characteristic_value_boolean')->nullable();
            $table->decimal('cs_product_characteristic_value_numeric', 16, 4)->nullable();
            $table->decimal('cs_product_characteristic_value_range_lower', 16, 4)->nullable();
            $table->decimal('cs_product_characteristic_value_range_upper', 16, 4)->nullable();
            $table->json('cs_product_characteristic_value_string')->nullable();
            $table->json('cs_product_characteristic_value_set')->nullable();
            $table->string('cs_product_characteristic_value_select', 60)->nullable();
            $table->string('cs_product_characteristic_value_unit_code', 3)->nullable();
            $table->char('cs_product_characteristic_reference_gtin', 14)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_country_specific_fields');
    }
};
