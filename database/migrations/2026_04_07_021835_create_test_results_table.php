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
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->string('id_pasien');
            $table->integer('total_score');
            $table->unsignedBigInteger('condition_id');
            $table->timestamps();

            $table->foreign('id_pasien')->references('id_pasien')->on('patients')->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
