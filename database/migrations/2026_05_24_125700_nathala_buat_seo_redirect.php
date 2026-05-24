<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nathala_seo_redirect', function (Blueprint $table) {

            $table->id('redirect_id');

            $table->string('redirect_from');
            $table->string('redirect_to');

            $table->integer('redirect_code')
                ->default(301);

            $table->boolean('redirect_is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nathala_seo_redirect');
    }
};