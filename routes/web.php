<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewSuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/print-surat/{id}', [ViewSuratController::class, 'printViewSurat'])->name("PRINT.VIEW_SURAT");
