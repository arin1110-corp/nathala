<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nathala_page', function (Blueprint $table) {

            $table->id('page_id');

            $table->string('page_judul');

            $table->string('page_slug')
                ->unique();

            $table->longText('page_content')
                ->nullable();

            $table->string('page_thumbnail')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('page_meta_title')
                ->nullable();

            $table->text('page_meta_description')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('page_is_active')
                ->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index('page_slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nathala_page');
    }
};