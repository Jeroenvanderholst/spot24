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

        Schema::create('lca_environmentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('manufacturer_product_number', 35);
            $table->enum('declared_unit_unit', ["KGM","LTR","MTK","MTQ","MTR","PCE","TNE","FOT","FTK","FTQ","LBR","LTN","YDK","YRD"]);
            $table->unsignedDecimal('declared_unit_quantity', 11, 4);
            $table->json('functional_unit_description')->nullable();
            $table->unsignedSmallInteger('lca_reference_lifetime');
            $table->enum('third_party_verification', ["none","internally","externally"]);
            $table->char('manufacturer_product_gtin', 14);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lca_environmentals');
    }
};
