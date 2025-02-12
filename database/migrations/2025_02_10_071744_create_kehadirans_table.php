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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_penjadwalan');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_penjadwalan')->references('id')->on('penjadwalans')->onDelete('cascade');
            $table->geometry('jadwal_lokasi_peta', subtype: 'point', srid: 0);
            $table->timestamp('jadwal_waktu_mulai')->nullable();
            $table->timestamp('jadwal_waktu_selesai')->nullable();
            $table->geometry('lokasi_peta', subtype: 'point', srid: 0);
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
