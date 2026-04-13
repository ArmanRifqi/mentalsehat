<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Perbaiki data tes lama yang belum menggunakan opsi E.
        DB::table('tests')
            ->where(function ($query) {
                $query->whereNull('opsi_e')
                      ->orWhere('opsi_e', '');
            })
            ->where('opsi_b', 'Kadang')
            ->where('opsi_c', 'Sering')
            ->where('opsi_d', 'Sangat Sering')
            ->update([
                'opsi_e' => DB::raw('opsi_d'),
                'skor_e' => 4,
                'opsi_d' => DB::raw('opsi_c'),
                'skor_d' => 3,
                'opsi_c' => DB::raw('opsi_b'),
                'skor_c' => 2,
                'opsi_b' => 'Jarang',
                'skor_b' => 1,
            ]);

        DB::table('tests')
            ->where(function ($query) {
                $query->whereNull('opsi_e')
                      ->orWhere('opsi_e', '');
            })
            ->update([
                'opsi_e' => 'Sangat Sering',
                'skor_e' => 4,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu rollback data secara otomatis.
    }
};
