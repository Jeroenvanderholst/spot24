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

        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_items');
            $table->string('supplier_item_number', 35)->index();
            $table->enum('price_unit', ["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]);
            $table->decimal('price_unit_factor', 15, 4)->unsigned()->nullable();
            $table->decimal('price_quantity', 9, 4)->unsigned();
            $table->boolean('price_on_request')->nullable();
            $table->decimal('gross_list_pricec', 15, 4)->unsigned()->nullable();
            $table->decimal('net_price', 15, 4)->unsigned()->nullable();
            $table->decimal('recommended_retail_price', 15, 4)->unsigned()->nullable();
            $table->decimal('vat', 4, 2)->unsigned()->nullable();
            $table->date('price_validity_date')->nullable();
            $table->date('price_expiry_date')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
