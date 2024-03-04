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
        Schema::create('class_links', function (Blueprint $table) {
            $table->id();
            $table->char('modelling_class_id', 8);
    	    $table->tinyInteger('modelling_class_version');
            $table->char('product_class_id', 8);
            $table->tinyInteger('product_class_version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_links');
    }
};
