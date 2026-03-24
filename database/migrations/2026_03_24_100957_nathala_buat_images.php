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
        //
        Schema::create('nathala_product_images', function (Blueprint $table) {
            $table->id('image_id');
            $table->unsignedBigInteger('image_product');
            $table->string('image_url');
            $table->boolean('image_is_featured')->default(false);
            $table->integer('image_sort_order')->default(0);
            $table->boolean('image_is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nathala_product_images');
    }
};