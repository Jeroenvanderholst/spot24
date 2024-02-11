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

        Schema::create('item_logistic_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_item');
            $table->string('supplier_item_number', 35)->index();
            $table->unsignedDecimal('base_item_net_length', 16, 4)->nullable();
            $table->unsignedDecimal('base_item_net_width', 16, 4)->nullable();
            $table->unsignedDecimal('base_item_net_height', 16, 4)->nullable();
            $table->unsignedDecimal('base_item_net_diameter', 16, 4)->nullable();
            $table->enum('net_dimension_unit', ["CMT","DTM","KTM","MMT","MTR","FOT","INH","SMI","YRD"])->nullable();
            $table->unsignedDecimal('base_item_net_weight', 16, 4)->nullable();
            $table->enum('net_weight_unit', ["GRM","KGM","MGM","TNE","LTN","LBR","ONZ"])->nullable();
            $table->unsignedDecimal('base_item_net_volume', 16, 4)->nullable();
            $table->enum('net_volume_unit', ["LTR","MLT","MMQ","MTQ","FTQ","INQ"])->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_logistic_details');
    }
};
