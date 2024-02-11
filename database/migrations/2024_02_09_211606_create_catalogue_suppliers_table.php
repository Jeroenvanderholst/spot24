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

        Schema::create('catalogue_suppliers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catalogue_id');
            $table->foreign('catalogue_id')->references('id')->on('catalogue');
            $table->bigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogue_suppliers');
    }
};
