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
            $table->unsignedBigInteger('view')->default(0);
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->unsignedBigInteger('view')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
