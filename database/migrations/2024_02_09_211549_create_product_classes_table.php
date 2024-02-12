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

        Schema::create('product_classes', function (Blueprint $table) {
            $table->id();
            $table->char('class_code', 8)->index()->foreign('Synonym.entity_id');
            $table->enum('status', ["2","3","5","9"]);
            $table->unsignedTinyInteger('version');
            $table->date('mutation_date')->nullable();
            $table->unsignedTinyInteger('revision')->nullable();
            $table->date('revision_date')->nullable();
            $table->char('group_id', 8);
            $table->foreign('group_id')->references('id')->on('groups');
            $table->string('description', 80)->index();
            $table->json('releases');
            $table->string('changecode', 80);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_classes');
    }
};
