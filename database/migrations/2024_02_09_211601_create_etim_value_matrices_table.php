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

        Schema::create('etim_value_matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etim_modelling_feature_id')->index();
            $table->foreign('etim_modelling_feature_id')->references('id')->on('etim_modelling_feature');
            $table->char('etim_modelling_class_id', 8)->index();
            $table->foreign('etim_modelling_class_id')->references('etim_modelling_class_id')->on('etim_modelling_feature');
            $table->char('etim_feature_id', 8)->index();
            $table->foreign('etim_feature_id')->references('etim_feature_id')->on('etim_modelling_feature');
            $table->decimal('etim_value_matrix_source', 16, 4);
            $table->decimal('etim_value_matrix_result', 16, 4);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etim_value_matrices');
    }
};
