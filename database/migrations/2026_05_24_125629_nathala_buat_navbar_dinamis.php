<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nathala_menu', function (Blueprint $table) {

            $table->id('menu_id');

            $table->string('menu_nama');

            $table->string('menu_url')
                ->nullable();

            $table->string('menu_target')
                ->default('_self');

            $table->integer('menu_sort_order')
                ->default(0);

            $table->boolean('menu_is_active')
                ->default(true);

            $table->timestamps();

            $table->index('menu_sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nathala_menu');
    }
};