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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedBigInteger('id_jam_kerja');
            $table->unsignedBigInteger('id_lokasi');
            $table->foreign('id_pengajuan')->references('id')->on('pengajuans')->onDelete('cascade');
            $table->foreign('id_jam_kerja')->references('id')->on('jam_kerjas')->onDelete('cascade');
            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
            $table->string('nomor_surat', 20)->unique();
            $table->string('nama_kegiatan', 100);
            $table->string('nama_PJ', 50);
            $table->string('jabatan_PJ', 30);
            $table->mediumText('ttd_PJ')->charset('binary');
            $table->string('narahubung', 50);
            $table->mediumText('qr_validasi')->charset('binary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
