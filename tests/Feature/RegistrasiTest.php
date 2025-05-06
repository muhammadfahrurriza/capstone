<?php

test('halaman registrasi dapat diakses oleh Pemohon Kegiatan', function () {
    $response = $this->get('/pemohon/register');
    $response->assertStatus(200);
});

test('halaman registrasi dapat diakses oleh Peserta Kegiatan', function () {
    $response = $this->get('/peserta/register');
    $response->assertStatus(200);
});
