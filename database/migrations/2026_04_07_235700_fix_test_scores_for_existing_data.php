<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tests')
            ->where('opsi_b', 'Jarang')
            ->where('opsi_c', 'Kadang')
            ->where('opsi_d', 'Sering')
            ->where('opsi_e', 'Sangat Sering')
            ->where('skor_e', 3)
            ->update([
                'skor_b' => 1,
                'skor_c' => 2,
                'skor_d' => 3,
                'skor_e' => 4,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No rollback needed for data correction.
    }
};
