<?php

test('halaman logout dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Kepala Dinas', function () {
    $response = $this->get('/kadin/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Sekretaris Dinas', function () {
    $response = $this->get('/sekdin/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Petugas', function () {
    $response = $this->get('/petugas/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Bagian Keuangan', function () {
    $response = $this->get('/keuangan/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Pemohon Kegiatan', function () {
    $response = $this->get('/pemohon/logout');
    $response->assertStatus(405);
});

test('halaman logout dapat diakses oleh Peserta Kegiatan', function () {
    $response = $this->get('/peserta/logout');
    $response->assertStatus(405);
});
