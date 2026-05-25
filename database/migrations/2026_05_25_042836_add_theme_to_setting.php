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
        Schema::table('nathala_setting', function (Blueprint $table) {
            $table->string('theme_primary')->default('#ec4899');
            $table->string('theme_secondary')->default('#fdf2f8');
            $table->string('theme_accent')->default('#f43f5e');
            $table->string('theme_text')->default('#1e293b');
            $table->string('theme_footer')->default('#ffffff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nathala_setting', function (Blueprint $table) {
            $table->dropColumn(['theme_primary', 'theme_secondary', 'theme_accent', 'theme_text', 'theme_footer']);
        });
    }
};