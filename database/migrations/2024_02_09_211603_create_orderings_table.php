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

        Schema::create('orderings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_item');
            $table->string('supplier_item_number', 35);
            $table->enum('order_unit', ["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]);
            $table->decimal('minimum_order_quantity', 16, 4)->unsigned();
            $table->decimal('order_step_size', 16, 4)->unsigned();
            $table->unsignedSmallInteger('standard_order_lead_time')->nullable();
            $table->enum('use_unit', ["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"])->nullable();
            $table->decimal('use_unit_conversion_factor', 16, 4)->unsigned()->nullable();
            $table->decimal('single_use_unit_quantity', 16, 4)->unsigned()->nullable();
            $table->enum('alternative_use_unit', ["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"])->nullable();
            $table->decimal('alternative_use_unit_conversion_factor', 16, 4)->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderings');
    }
};
