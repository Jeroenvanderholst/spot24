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

        Schema::create('item_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_item_id')->index();
            $table->foreign('trade_item_id')->references('id')->on('trade_item');
            $table->string('supplier_item_number', 35);
            $table->foreign('supplier_item_number')->references('supplier_item_number')->on('trade_item');
            $table->enum('attachment_type', ["ATX001","ATX002","ATX003","ATX004","ATX005","ATX006","ATX007","ATX008","ATX009","ATX010","ATX011","ATX012","ATX013","ATX014","ATX015","ATX016","ATX017","ATX018","ATX019","ATX020","ATX021","ATX099"]);
            $table->json('attachment_language')->nullable();
            $table->json('attachment_type_specification')->nullable();
            $table->string('attachment_filename', 100);
            $table->string('attachment_uri', 255);
            $table->json('attachment_description')->nullable();
            $table->date('attachment_issue_date')->nullable();
            $table->date('attachment_expiry_date')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_attachments');
    }
};
