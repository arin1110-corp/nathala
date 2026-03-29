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
        Schema::create('nathala_kategori', function (Blueprint $table) {
            $table->id('kategori_id');

            // Basic
            $table->string('kategori_nama');
            $table->string('kategori_slug')->unique();
            $table->text('kategori_deskripsi')->nullable();


            // Image
            $table->string('kategori_thumbnail')->nullable(); // foto kategori

            // Status & Visibility
            $table->boolean('kategori_is_active')->default(true);
            $table->boolean('kategori_is_visible')->default(true);

            // SEO
            $table->string('kategori_meta_title')->nullable();
            $table->text('kategori_meta_description')->nullable();
            $table->text('kategori_meta_keywords')->nullable();

            // Sorting (biar bisa urut manual di UI)
            $table->integer('kategori_sort_order')->default(0);

            // Timestamps
            $table->timestamps();
            $table->softDeletes();

            // Index biar cepat
            $table->index('kategori_slug');
            $table->index('kategori_parent');
            $table->index('kategori_is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nathala_kategori');
    }
};