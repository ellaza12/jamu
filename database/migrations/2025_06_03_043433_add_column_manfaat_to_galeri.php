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
        Schema::table('galeri', function (Blueprint $table) {
            $table->text('deskripsi')->after('nama');
            $table->text('manfaat')->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
             $table->dropColumn(['deskripsi', 'manfaat']);
        });
    }
};
