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
        Schema::create('reimburses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bbm');
            $table->unsignedBigInteger('id_souvenir');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_bbm')->references('id')->on('bbms')->onDelete('cascade');
            $table->foreign('id_souvenir')->references('id')->on('souvenirs')->onDelete('cascade');
            $table->dateTime('tgl_pengajuan');
            $table->dateTime('tgl_diterima')->nullable();
            $table->dateTime('tgl_ditolak');
            $table->string('status');
            $table->integer('biaya');
            $table->enum('jenis_reimburse', ['bbm', 'souvenir'])->default('bbm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimburses');
    }
};
