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

        Schema::create('etim_modelling_ports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('etim_classification');
            $table->char('etim_modelling_class_id',8);
            $table->foreign('etim_modelling_class_id')->references('etim_modelling_class_id')->on('etim_classification');
            $table->unsignedTinyInteger('etim_modelling_portcode');
            $table->char('etim_modelling_connection_type_code', 8);
            $table->foreign('etim_modelling_connection_type_code')->references('etim_modelling_class_id')->on('etim\modelling_class');
            $table->unsignedTinyInteger('etim_modelling_connection_type_version');
            $table->foreignId('etim_classification_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etim_modelling_ports');
    }
};
