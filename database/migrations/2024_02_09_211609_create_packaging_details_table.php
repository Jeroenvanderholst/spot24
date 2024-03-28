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

        Schema::create('packaging_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packaging_id')->index();
            $table->foreign('packaging_id')->references('id')->on('packaging_identification');
            $table->string('supplier_packaging_part_number', 35)->nullable();
            $table->string('manufacturer_packaging_part_number', 35)->nullable();
            $table->json('packaging_part_gtin')->nullable();
            $table->decimal('packaging_type_length', 16, 4)->unsigned()->nullable();
            $table->decimal('packaging_type_width', 16, 4)->unsigned()->nullable();
            $table->decimal('packaging_type_height', 16, 4)->unsigned()->nullable();
            $table->decimal('packaging_type_diameter', 16, 4)->unsigned()->nullable();
            $table->enum('packaging_type_dimension_unit', ["CMT","DTM","KTM","MMT","MTR","FOT","INH","SMI","YRD"])->nullable();
            $table->decimal('packaging_type_weight', 16, 4)->unsigned()->nullable();
            $table->enum('packaging_type_weight_unit', ["GRM","KGM","MGM","TNE","LTN","LBR","ONZ"])->nullable();
            $table->unsignedTinyInteger('packaging_stackable')->nullable();
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
        Schema::dropIfExists('packaging_details');
    }
};
