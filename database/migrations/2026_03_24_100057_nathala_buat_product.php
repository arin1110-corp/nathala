<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('nathala_product', function (Blueprint $table) {
            $table->id('product_id');

            // Basic Info
            $table->string('product_nama');
            $table->string('product_slug')->unique();
            $table->unsignedBigInteger('product_kategori');
            $table->string('product_merk')->nullable();
            $table->string('product_sku')->nullable();

            // Descriptions
            $table->text('product_deskripsi')->nullable(); // final description
            $table->text('product_deskripsi_ringkas')->nullable(); // optional short description

            // AI Fields
            $table->text('product_ai_description')->nullable(); // hasil AI
            $table->text('product_ai_prompt')->nullable(); // prompt yang dipakai generate
            $table->text('product_ai_tags')->nullable(); // keyword AI

            // Pricing & Stock
            $table->bigInteger('product_harga')->default(0);
            $table->integer('product_stok')->default(0);

            // Status
            $table->enum('product_status', ['Draft', 'Active', 'Archived'])->default('Draft');

            // SEO
            $table->string('product_meta_title')->nullable();
            $table->text('product_meta_description')->nullable();
            $table->text('product_meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nathala_product');
    }
};