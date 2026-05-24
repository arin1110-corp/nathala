<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nathala_setting', function (Blueprint $table) {

            $table->id('setting_id');

            /*
            |--------------------------------------------------------------------------
            | SITE INFO
            |--------------------------------------------------------------------------
            */

            $table->string('site_name')->nullable();
            $table->string('site_tagline')->nullable();
            $table->text('site_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | BRANDING
            |--------------------------------------------------------------------------
            */

            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CONTACT
            |--------------------------------------------------------------------------
            */

            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_whatsapp')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SOCIAL
            |--------------------------------------------------------------------------
            */

            $table->string('site_instagram')->nullable();
            $table->string('site_tiktok')->nullable();
            $table->string('site_youtube')->nullable();
            $table->string('site_facebook')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('site_meta_title')->nullable();
            $table->text('site_meta_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | TRACKING SCRIPT
            |--------------------------------------------------------------------------
            */

            $table->longText('site_google_analytics')
                ->nullable();

            $table->longText('site_meta_pixel')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nathala_setting');
    }
};