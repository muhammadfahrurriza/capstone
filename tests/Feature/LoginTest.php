<?php

test('halaman login dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Kepala Dinas', function () {
    $response = $this->get('/kadin/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Sekretaris Dinas', function () {
    $response = $this->get('/sekdin/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Petugas', function () {
    $response = $this->get('/petugas/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Bagian Keuangan', function () {
    $response = $this->get('/keuangan/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Pemohon Kegiatan', function () {
    $response = $this->get('/pemohon/login');
    $response->assertStatus(200);
});

test('halaman login dapat diakses oleh Peserta Kegiatan', function () {
    $response = $this->get('/peserta/login');
    $response->assertStatus(200);
});
