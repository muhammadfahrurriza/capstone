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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengirim');
            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedBigInteger('id_penjadwalan');
            $table->unsignedBigInteger('id_reimburse');
            $table->foreign('id_pengirim')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_penerima')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pengajuan')->nullable()->references('id')->on('pengajuans')->onDelete('cascade');
            $table->foreign('id_penjadwalan')->nullable()->references('id')->on('penjadwalans')->onDelete('cascade');
            $table->foreign('id_reimburse')->nullable()->references('id')->on('reimburses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
