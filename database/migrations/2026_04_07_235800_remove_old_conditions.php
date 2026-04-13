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
        // Find old condition IDs
        $oldConditionIds = DB::table('conditions')
            ->where('max_score', '<=', 45)
            ->pluck('id')
            ->toArray();

        // Delete test results referencing old conditions
        DB::table('test_results')
            ->whereIn('condition_id', $oldConditionIds)
            ->delete();

        // Delete old conditions
        DB::table('conditions')
            ->where('max_score', '<=', 45)
            ->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No rollback needed
    }
};
