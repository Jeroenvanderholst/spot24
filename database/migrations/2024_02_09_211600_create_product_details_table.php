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

        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('manufacturer_product_number', 35)->index();
            $table->enum('product_status', ["PRE-LAUNCH","ACTIVE","ON_HOLD","PLANNED_WITHDRAWAL","OBSOLETE"])->default('ACTIVE');
            $table->enum('product_type', ["PHYSICAL","CONTRACT","LICENCE","SERVICE"])->nullable();
            $table->boolean('customisable_product')->default(false)->nullable();
            $table->unsignedSmallInteger('warranty_consumer')->nullable();
            $table->unsignedSmallInteger('warranty_business')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
