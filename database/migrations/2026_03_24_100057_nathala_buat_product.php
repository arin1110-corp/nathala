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
            $table->string('product_link')->nullable(); // optional external link

            $table->integer('product_total_click')->default(0);
            $table->enum('product_platform', ['shopee', 'tokopedia', 'tiktok'])->default('shopee');

            // Descriptions
            $table->text('product_deskripsi')->nullable(); // final description
            $table->text('product_deskripsi_ringkas')->nullable(); // optional short description

            // Pricing & Stock
            $table->bigInteger('product_harga')->default(0);
            $table->integer('product_stok')->default(0);

            // Status
            $table->enum('product_status', ['draft', 'active', 'archived'])->default('draft');

            // SEO
            $table->string('product_meta_title')->nullable();
            $table->text('product_meta_description')->nullable();
            $table->text('product_meta_keywords')->nullable();

            $table->string('product_thumbnail')->nullable();
            $table->boolean('product_is_index')->default(true);
            $table->string('product_canonical')->nullable();

            $table->string('product_og_title')->nullable();
            $table->text('product_og_description')->nullable();
            $table->string('product_og_image')->nullable();

            $table->integer('product_berat')->nullable();
            $table->integer('product_terjual')->default(0);

            $table->timestamp('product_published_at')->nullable();
            $table->json('product_attributes')->nullable();

            $table->timestamps();
            $table->softDeletes();
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