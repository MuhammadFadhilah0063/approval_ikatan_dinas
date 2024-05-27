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
        Schema::create('ikatan_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ikatan_dinas', 100);
            $table->string('nrp_peserta', 20);
            $table->string('nama_peserta', 100);
            $table->string('departemen', 255);
            $table->string('posisi', 255);
            $table->string('nama_pelatihan', 255);
            $table->date('waktu_pelatihan');
            $table->double('biaya_pelatihan');
            $table->string('lama_ikatan_dinas', 20);
            $table->date('tgl_selesai_ikatan_dinas');
            $table->boolean('status')->default(0);
            $table->date('tgl_ttd')->nullable();
            $table->text('ttd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikatan_dinas');
    }
};
