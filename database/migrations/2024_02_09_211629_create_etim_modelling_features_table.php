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

        Schema::create('etim_modelling_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etim_modelling_port_id')->index();
            $table->foreign('etim_modelling_port_id')->references('id')->on('etim_modelling_ports');
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('etim_modelling_port');
            $table->string('etim_modelling_class_id')->index();
            $table->foreign('etim_modelling_class_id')->references('etim_modelling_class_id')->on('etim_modelling_port');
            $table->unsignedTinyInteger('etim_modelling_portcode');
            $table->char('etim_feature_id', 8);
            $table->char('etim_value_id', 8)->nullable();
            $table->decimal('etim_value_numeric', 16, 4)->nullable();
            $table->decimal('etim_value_range_lower', 16, 4)->nullable();
            $table->decimal('etim_value_range_upper', 16, 4)->nullable();
            $table->boolean('etim_value_logical')->nullable();
            $table->decimal('etim_value_coordinate_x', 16, 4)->nullable();
            $table->decimal('etim_value_coordinate_y', 16, 4)->nullable();
            $table->decimal('etim_value_coordinate_z', 16, 4)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etim_modelling_features');
    }
};
