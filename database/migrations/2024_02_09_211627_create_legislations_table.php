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

        Schema::create('legislations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('manufacturer_product_number', 35)->index();
            $table->boolean('electric_component_contained')->nullable();
            $table->boolean('battery_contained')->nullable();
            $table->enum('weee_category', ["1","2","3","4","5","6","7"])->nullable();
            $table->enum('rohs_indicator', ["true","false","exempt"])->nullable();
            $table->boolean('ce_marking')->nullable();
            $table->boolean('sds_indicatobigintr')->nullable();
            $table->enum('reach_indicator', ["true","false","no data"])->nullable();
            $table->date('reach_date')->nullable();
            $table->char('scip_number', 36)->nullable();
            $table->char('ufi_code', 19)->nullable();
            $table->char('un_number', 4)->nullable();
            $table->json('hazard_class');
            $table->enum('adr_category', ["0","1","2","3","4"])->nullable();
            $table->decimal('net_weight_hazardous_substances', 16, 4)->unsigned()->nullable();
            $table->decimal('volume_hazardous_substances', 16, 4)->unsigned()->nullable();
            $table->json('un_shipping_name')->nullable();
            $table->enum('packing_group', ["I","II","III"])->nullable();
            $table->boolean('limited_quantities')->nullable();
            $table->boolean('excepted_quantities')->nullable();
            $table->enum('aggregation_state', ["L","S","G"])->nullable();
            $table->json('special_provision_id')->nullable();
            $table->string('classification_code', 5)->nullable();
            $table->json('hazard_label')->nullable();
            $table->boolean('environmental_hazards')->nullable();
            $table->enum('tunnel_code', ["A","B","C","D","E"])->nullable();
            $table->json('label_code')->nullable();
            $table->enum('signal_word', ["D","W"])->nullable();
            $table->json('hazard_statement')->nullable();
            $table->json('precautionary_statement')->nullable();
            $table->boolean('li_ion_tested')->nullable();
            $table->decimal('lithium_amount', 16, 4)->unsigned()->nullable();
            $table->decimal('battery_energy', 16, 4)->unsigned()->nullable();
            $table->boolean('nos274')->nullable();
            $table->json('hazard_trigger')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legislations');
    }
};
