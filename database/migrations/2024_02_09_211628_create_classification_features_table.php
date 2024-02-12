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

        Schema::create('classification_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('other_classifications');
            $table->string('manufacturer_product_number', 35);
            $table->string('classification_feature_name', 100)->nullable();
            $table->string('classification_feature_value1', 100)->nullable();
            $table->string('classification_feature_value2', 100)->nullable();
            $table->string('classification_feature_uni', 100)->nullable();
            $table->foreignId('other_classification_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classification_features');
    }
};
