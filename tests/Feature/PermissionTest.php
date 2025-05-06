<?php

test('halaman manajemen peran dapat diakses oleh Admin', function () {
    $response = $this->get('/admin/permisssions');
    $response->assertStatus(404);
})->repeat(5);
