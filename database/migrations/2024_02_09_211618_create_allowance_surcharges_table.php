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

        Schema::create('allowance_surcharges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricing_id')->index();
            $table->foreign('pricing_id')->references('id')->on('price');
            $table->enum('allowance_surcharge_indicator', ["ALLOWANCE","SURCHARGE"]);
            $table->date('allowance_surcharge_validity_date')->nullable();
            $table->enum('allowance_surcharge_type', ["AAT","ABL","ADO","ADR","ADZ","AEM","AEO","AEP","AEQ","CAI","DAE","DBD","FC","HD","INS","MAC","MAT","PAD","PI","QD","RAD","SH","TD","WHE","X21"]);
            $table->unsignedDecimal('allowance_surcharge_amount', 15, 4)->nullable();
            $table->unsignedTinyInteger('allowance_surcharge_sequence_number')->nullable();
            $table->unsignedDecimal('allowance_surcharge_percentage', 6, 3)->nullable();
            $table->json('allowance_surcharge_description')->nullable();
            $table->unsignedDecimal('allowance_surcharge_minimum_quantity', 16, 4)->nullable();
            $table->foreignId('price_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowance_surcharges');
    }
};
