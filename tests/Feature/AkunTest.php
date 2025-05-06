<?php

test('halaman manajemen akun dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/users');
    $response->assertStatus(404);
});
