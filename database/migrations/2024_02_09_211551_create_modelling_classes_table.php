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

        Schema::create('modelling_classes', function (Blueprint $table) {
            $table->id();
            $table->char('modelling_class_id', 8)->index();
            $table->unsignedTinyInteger('version');
            $table->enum('status', ["2","3","5","9"]);
            $table->date('mutation_date')->nullable();
            $table->unsignedTinyInteger('revision')->nullable();
            $table->date('revision_date')->nullable();
            $table->boolean('modelling');
            $table->string('description', 80)->index();
            $table->char('group_id', 8);
            $table->foreign('group_id')->references('id')->on('modelling_group');
            $table->string('drawing_uri', 255)->nullable();
            $table->string('changecode', 80)->nullable();
            $table->foreignId('modelling_group_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelling_classes');
    }
};
