<?php

test('halaman dashboard dapat diakses oleh Admin', function () {
    $response = $this->get('/admin');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Kepala Dinas', function () {
    $response = $this->get('/kadin');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Sekretaris Dinas', function () {
    $response = $this->get('/sekdin');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Petugas', function () {
    $response = $this->get('/petugas');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Bagian Keuangan', function () {
    $response = $this->get('/keuangan');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Pemohon Kegiatan', function () {
    $response = $this->get('/pemohon');
    $response->assertStatus(302);
});

test('halaman dashboard dapat diakses oleh Peserta Kegiatan', function () {
    $response = $this->get('/peserta');
    $response->assertStatus(302);
});
