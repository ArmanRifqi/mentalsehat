<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->string('opsi_e')->nullable()->after('opsi_d');
            $table->integer('skor_e')->nullable()->after('skor_d');
        });

        DB::table('tests')->update([
            'opsi_e' => DB::raw('opsi_d'),
            'skor_e' => DB::raw('skor_d'),
            'opsi_d' => DB::raw('opsi_c'),
            'skor_d' => DB::raw('skor_c'),
            'opsi_c' => DB::raw('opsi_b'),
            'skor_c' => DB::raw('skor_b'),
            'opsi_b' => 'Jarang',
            'skor_b' => 1,
        ]);

        DB::table('tests')->whereNull('opsi_e')->update([
            'opsi_e' => 'Sangat Sering',
        ]);

        DB::table('tests')->whereNull('skor_e')->update([
            'skor_e' => 4,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn(['opsi_e', 'skor_e']);
        });
    }
};
