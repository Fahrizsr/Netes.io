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
        Schema::create('rotasi_telur', function (Blueprint $table) {
            $table->id('id_rotasi');
            $table->integer('jumlah_rotasi');
            $table->time('jam_rotasi');
            $table->unsignedBigInteger('id_riwayat');
            $table->foreign('id_riwayat')->references('id_riwayat')->on('riwayat_inkubasi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotasi_telur');
    }
};
