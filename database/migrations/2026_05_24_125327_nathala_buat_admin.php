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
        Schema::create('nathala_admin', function (Blueprint $table) {

            $table->id('admin_id');

            /*
            |--------------------------------------------------------------------------
            | BASIC
            |--------------------------------------------------------------------------
            */

            $table->string('admin_nama');

            $table->string('admin_username')
                ->unique();

            $table->string('admin_email')
                ->unique();

            $table->string('admin_password');

            /*
            |--------------------------------------------------------------------------
            | PROFILE
            |--------------------------------------------------------------------------
            */

            $table->string('admin_foto')
                ->nullable();

            $table->string('admin_phone')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | ROLE
            |--------------------------------------------------------------------------
            */

            $table->enum('admin_role', [
                'superadmin',
                'admin'
            ])->default('admin');

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('admin_is_active')
                ->default(true);

            $table->timestamp('admin_last_login')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | REMEMBER TOKEN
            |--------------------------------------------------------------------------
            */

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();

            /*
            |--------------------------------------------------------------------------
            | INDEX
            |--------------------------------------------------------------------------
            */

            $table->index('admin_username');
            $table->index('admin_email');
            $table->index('admin_role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nathala_admin');
    }
};