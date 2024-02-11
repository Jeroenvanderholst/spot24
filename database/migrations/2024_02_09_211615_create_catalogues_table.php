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

        Schema::create('catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('catalogue_id', 20)->unique();
            $table->json('catalogue_name')->nullable();
            $table->string('version', 50)->nullable();
            $table->string('contract_reference_number', 20)->nullable();
            $table->enum('catalogue_type', ["FULL","CHANGE"]);
            $table->string('change_reference_catalogue_version', 50)->nullable();
            $table->date('generation_date')->nullable();
            $table->string('name_data_creator', 50)->nullable();
            $table->string('email_data_creator', 255)->nullable();
            $table->string('buyer_name', 50)->nullable();
            $table->char('buyer_id_gln', 13)->nullable();
            $table->char('buyer_id_duns', 9)->nullable();
            $table->string('datapool_name', 50)->nullable();
            $table->char('datapool_gln', 13)->nullable();
            $table->date('catalogue_validity_start');
            $table->date('catalogue_validity_end')->nullable();
            $table->char('country', 2)->nullable();
            $table->char('language', 5);
            $table->char('currency_code', 3)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogues');
    }
};
