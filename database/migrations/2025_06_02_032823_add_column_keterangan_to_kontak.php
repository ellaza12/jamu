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
        Schema::table('kontak', function (Blueprint $table) {
            $table->text('keterangan')->after('no_tlp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kontak', function (Blueprint $table) {
              $table->$table->dropColumn('keterangan');
        });
    }
};
