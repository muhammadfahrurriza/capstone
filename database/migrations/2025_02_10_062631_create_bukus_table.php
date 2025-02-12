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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori_bukus')->onDelete('cascade');
            $table->string('judul');
            $table->string('penulis',50);
            $table->string('penerbit',50);
            $table->string('lokasi_terbit',50);
            $table->year('tahun_terbit');
            $table->string('isbn',20);
            $table->string('cover');
            $table->integer('jml_tersedia');
            $table->enum('keadaan buku', [
                'rusak',
                'hilang',
                'normal'
                ])->default('normal');
            $table->mediumText('bar_kode')->charset('binary'); // MEDIUMBLOB
            $table->integer('harga_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
