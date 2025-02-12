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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('tgl_pengajuan');
            $table->dateTime('tgl_diterima_admin');
            $table->dateTime('tgl_ditolak_admin');
            $table->dateTime('tgl_diterima_sekdin');
            $table->dateTime('tgl_ditolak_sekdin');
            $table->dateTime('tgl_diterima_kadin');
            $table->dateTime('tgl_ditolak_kadin');
            $table->dateTime('tgl_selesai');
            $table->string('keterangan',1000);
            $table->enum('status', [
                'Diajukan',
                'Diterima Admin', 
                'Ditolak Admin',
                'Diterima Sekdin', 
                'Ditolak Sekdin',
                'Diterima Kadin', 
                'Ditolak Kadin', 
                'Selesai'
                ])->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
