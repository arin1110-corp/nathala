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
        Schema::create('nathala_slider', function (Blueprint $table) {
            $table->id('slider_id');

            // Basic
            $table->string('slider_nama')->nullable(); // nama internal (admin)
            $table->string('slider_judul')->nullable(); // teks besar di banner
            $table->text('slider_deskripsi')->nullable(); // teks kecil

            // Image
            $table->string('slider_image'); // wajib (banner utama)
            $table->string('slider_image_mobile')->nullable(); // optional versi mobile

            // Link / CTA
            $table->string('slider_link')->nullable(); // klik ke mana
            $table->string('slider_button_text')->nullable(); // contoh: "Shop Now"

            // Posisi (biar bisa banyak slider)
            $table->enum('slider_posisi', ['home', 'promo', 'kategori'])->default('home');

            // Urutan
            $table->integer('slider_sort_order')->default(0);

            // Status
            $table->boolean('slider_is_active')->default(true);

            // Jadwal tayang (penting buat promo!)
            $table->timestamp('slider_mulai')->nullable();
            $table->timestamp('slider_selesai')->nullable();

            // SEO ringan
            $table->string('slider_alt_text')->nullable();

            $table->enum('slider_tipe', ['image', 'video'])->default('image');
            $table->string('slider_video_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nathala_slider');
    }
};