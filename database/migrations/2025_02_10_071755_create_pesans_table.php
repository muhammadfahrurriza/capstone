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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengirim');
            $table->unsignedBigInteger('id_penerima');
            $table->foreign('id_pengirim')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_penerima')->references('id')->on('chats')->onDelete('cascade');
            $table->timestamp('sent_at')->useCurrent(); // Waktu pesan dikirim
            $table->timestamp('read_at')->nullable(); // Waktu pesan dibaca
            $table->string('isi_pesan',1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
