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
        Schema::create('nathala_product_clicks', function (Blueprint $table) {
            $table->id('click_id');

            // Relasi ke produk
            $table->unsignedBigInteger('click_product');

            // Tracking basic
            $table->string('click_ip_address')->nullable();
            $table->text('click_user_agent')->nullable();

            // Optional (recommended)
            $table->string('click_referer')->nullable(); // dari mana datangnya
            $table->string('click_device')->nullable(); // mobile / desktop (optional olah di backend)

            $table->timestamps();


            // Index biar cepat
            $table->index('click_product');
            $table->index('click_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nathala_product_clicks');
    }
};