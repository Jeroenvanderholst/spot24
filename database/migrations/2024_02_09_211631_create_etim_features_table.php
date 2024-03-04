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

        Schema::create('etim_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('etim_classifications');
            $table->char('etim_class_id', 8)->index();
            $table->unsignedTinyInteger('etim_class_version');
            $table->char('etim_feature_id', 8)->index();
            $table->char('etim_value_id', 8)->nullable();
            $table->decimal('etim_value_numeric', 16, 4)->nullable();
            $table->decimal('etim_value_range_lower', 16, 4)->nullable();
            $table->decimal('etim_value_upper', 16, 4)->nullable();
            $table->boolean('etim_value_logical')->nullable();
            $table->json('etim_value_details')->nullable();
            $table->enum('reason_no_value', ["MV","NA","UN"])->nullable();
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
        Schema::dropIfExists('etim_features');
    }
};
