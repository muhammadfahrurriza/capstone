<?php

test('halaman pengajuan surat dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/surats');
    $response->assertStatus(302);
});

test('halaman pengajuan surat dapat diakses oleh Kepala Dinas', function () {
    $response = $this->get('/kadin/surats');
    $response->assertStatus(302);
});

// test('halaman pengajuan surat dapat diakses oleh Sekretaris Dinas', function () {
//     $response = $this->get('/sekdin/surats');
//     $response->assertStatus(302);
// });

// test('halaman pengajuan surat dapat diakses oleh Pemohon Kegiatan', function () {
//     $response = $this->get('/pemohon/surats');
//     $response->assertStatus(200);
// });
