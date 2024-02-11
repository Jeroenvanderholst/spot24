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

        Schema::create('product_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('manufacturer_product_number', 35)->index();
            $table->char('description_language', 5)->index()->nullable();
            $table->string('minimal_product_description', 80);
            $table->string('unique_main_product_description', 256)->nullable();
            $table->text('full_product_description')->nullable();
            $table->text('product_marketing_text')->nullable();
            $table->text('product_specification_text')->nullable();
            $table->text('product_application_instructions')->nullable();
            $table->string('product_keyword', 50)->nullable();
            $table->string('product_page_uri', 255)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_descriptions');
    }
};
