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
        Schema::create('evaluasi_atasan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_evaluasi_atasan', 100);
            $table->string('nrp_karyawan', 25);
            $table->string('nama_karyawan', 100);
            $table->string('departemen', 255);
            $table->string('posisi', 255);
            $table->string('nama_pelatihan', 255);
            $table->string('bulan_tahun_pelatihan', 100);
            $table->string('jenis_pelatihan', 255);
            $table->string('vendor_pelatihan', 255);
            $table->string('nrp_atasan', 25);
            $table->string('nama_atasan', 255);
            $table->string('posisi_atasan', 255);
            $table->string('nama_atasan_hcga', 255);
            $table->string('posisi_atasan_hcga', 255);
            $table->enum('status_penilaian', ['Belum', 'Sudah'])->default('Belum');
            $table->enum('status_approve', ['Belum', 'Sudah'])->default('Belum');
            $table->date('tgl_ttd')->nullable();
            $table->text('ttd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_atasan');
    }
};
