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
        Schema::create('disposisi_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_surat')->references('id')->on('surats')->onDelete('cascade');
            $table->timestamp('tgl_disposisi_kadin')->nullable();
            $table->timestamp('tgl_tenggat')->nullable();
            $table->timestamp('tgl_disposisi_sekdin')->nullable();
            $table->timestamp('tgl_disposisi_petugas')->nullable();
            $table->timestamp('tgl_selesai')->nullable();
            $table->string('keterangan',1000);
            $table->enum('status', [
                'Belum Baca',
                'Sudah Baca',
                'Sudah Disposisi',
                'Selesai'
                ])->default('Belum Baca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_surats');
    }
};
