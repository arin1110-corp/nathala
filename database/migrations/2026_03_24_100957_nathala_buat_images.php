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
        Schema::create('nathala_product_images', function (Blueprint $table) {

            $table->id('image_id');

            /*
            |--------------------------------------------------------------------------
            | RELATION
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('image_product');

            /*
            |--------------------------------------------------------------------------
            | IMAGE
            |--------------------------------------------------------------------------
            */

            $table->string('image_url');

            // Thumbnail utama
            $table->boolean('image_is_featured')
                ->default(false);

            // Urutan gambar
            $table->integer('image_sort_order')
                ->default(0);

            // Status aktif
            $table->boolean('image_is_active')
                ->default(true);

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */

            $table->foreign('image_product')
                ->references('product_id')
                ->on('nathala_product')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nathala_product_images', function (Blueprint $table) {
            $table->dropForeign(['image_product']);
        });

        Schema::dropIfExists('nathala_product_images');
    }
};