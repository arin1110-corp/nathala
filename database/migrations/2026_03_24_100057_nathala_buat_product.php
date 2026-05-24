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
        Schema::create('nathala_product', function (Blueprint $table) {

            $table->id('product_id');

            /*
            |--------------------------------------------------------------------------
            | BASIC INFO
            |--------------------------------------------------------------------------
            */

            $table->string('product_nama');
            $table->string('product_slug')->unique();

            // Relasi kategori
            $table->unsignedBigInteger('product_kategori');

            $table->string('product_merk')->nullable();
            $table->string('product_sku')->nullable();

            /*
            |--------------------------------------------------------------------------
            | AFFILIATE
            |--------------------------------------------------------------------------
            */

            // Platform affiliate
            $table->string('product_platform')
                ->default('shopee');

            // Link affiliate
            $table->text('product_affiliate_link')->nullable();

            // Link asli marketplace (optional)
            $table->text('product_original_link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PRODUCT CONTENT
            |--------------------------------------------------------------------------
            */

            $table->text('product_deskripsi')->nullable();
            $table->text('product_deskripsi_ringkas')->nullable();

            /*
            |--------------------------------------------------------------------------
            | DISPLAY / MARKETING
            |--------------------------------------------------------------------------
            */

            // Harga optional (karena affiliate)
            $table->bigInteger('product_harga')->nullable();

            // Harga coret / diskon optional
            $table->bigInteger('product_harga_diskon')->nullable();

            // Thumbnail utama
            $table->string('product_thumbnail')->nullable();

            // Badge marketing
            $table->string('product_badge')->nullable();
            // contoh:
            // Best Seller, Viral TikTok, Original, Premium

            // Produk unggulan
            $table->boolean('product_featured')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | ANALYTICS
            |--------------------------------------------------------------------------
            */

            $table->integer('product_total_click')
                ->default(0)
                ->index();

            $table->integer('product_terjual')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->enum('product_status', [
                'draft',
                'active',
                'archived'
            ])->default('draft');

            $table->timestamp('product_published_at')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO BASIC
            |--------------------------------------------------------------------------
            */

            $table->string('product_meta_title')
                ->nullable();

            $table->text('product_meta_description')
                ->nullable();

            $table->boolean('product_is_index')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | EXTRA ATTRIBUTE (Flexible)
            |--------------------------------------------------------------------------
            */

            $table->json('product_attributes')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | TIMESTAMP
            |--------------------------------------------------------------------------
            */

            $table->timestamps();
            $table->softDeletes();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */

            $table->foreign('product_kategori')
                ->references('kategori_id')
                ->on('nathala_kategori')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nathala_product', function (Blueprint $table) {
            $table->dropForeign(['product_kategori']);
        });

        Schema::dropIfExists('nathala_product');
    }
};