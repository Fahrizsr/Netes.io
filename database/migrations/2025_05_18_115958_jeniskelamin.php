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
         Schema::create('jenis_kelamin', function (Blueprint $table) {
            $table->id('id_jeniskelamin');
            $table->integer('jenis_kelamin')->comment('1 = jantan, 2 = betina, 3 = campuran');
            $table->unsignedBigInteger('id_riwayat');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jeniskelamin');
    }
};
