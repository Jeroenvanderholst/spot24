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

        Schema::create('modelling_class_ports', function (Blueprint $table) {
            $table->id();
            $table->char('modelling_class_id', 8)->index();
            $table->foreign('modelling_class_id')->references('id')->on('modelling_class');
            $table->unsignedTinyInteger('port_code');
            $table->char('connection_type_id', 8)->index();
            $table->foreign('connection_type_id')->references('id')->on('modelling_class');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelling_class_ports');
    }
};
