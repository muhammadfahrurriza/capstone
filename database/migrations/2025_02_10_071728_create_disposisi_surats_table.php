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
            $table->foreignId('surat_id')->constrained()->onDelete('cascade');
            $table->foreignId('disposisi_id')->constrained()->onDelete('cascade');
            $table->timestamps('tanggal_pengajuan');
            $table->timestamps('tanggal_selesai')->nullable();
            $table->string('keterangan',1000);
            $table->enum('status', [
                'Belum Baca',
                'Sudah Baca',
                'Dalam Proses',
                'Selesai'
                ])->default('user');
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
