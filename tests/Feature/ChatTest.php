<?php

test('halaman chat dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Kepala Dinas', function () {
    $response = $this->get('/kadin/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Sekretaris Dinas', function () {
    $response = $this->get('/sekdin/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Petugas', function () {
    $response = $this->get('/petugas/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Bagian Keuangan', function () {
    $response = $this->get('/keuangan/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Pemohon Kegiatan', function () {
    $response = $this->get('/pemohon/chat');
    $response->assertStatus(302);
});

test('halaman chat dapat diakses oleh Peserta Kegiatan', function () {
    $response = $this->get('/peserta/chat');
    $response->assertStatus(302);
});
