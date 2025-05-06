<?php

test('halaman manajemen izin dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/roles');
    $response->assertStatus(302);
})->repeat(5);
