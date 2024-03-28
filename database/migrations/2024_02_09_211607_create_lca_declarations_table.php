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

        Schema::create('lca_declarations', function (Blueprint $table) {
            $table->id();
            $table->string('lca_environmental_id', 35);
            $table->foreign('lca_environmental_id')->references('id')->on('lca_environmental');
            $table->enum('life_cycle_stage', ["A1","A2","A3","A1-A3","A4","A5","B1","B2","B3","B4","B5","B6","B7","C1","C2","C3","C4","D"]);
            $table->enum('lca_declaration_indicator', ["MDE","MND","MNR","AGG"]);
            $table->decimal('declared_unit_gwp_total', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_ap', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_ep_freshwater', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_ep_marine', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_ep_terrestrial', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_pocp', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_odp', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_adpe', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_adpf', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_wdp', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_pert', 16, 4)->unsigned()->nullable();
            $table->decimal('declared_unit_penrt', 16, 4)->unsigned()->nullable();
            $table->decimal('column_17', 16, 4)->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lca_declarations');
    }
};
