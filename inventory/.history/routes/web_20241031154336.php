<?php

use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index'])->name('inventory.index');
Route::resource('barang', BarangController::class)->except(['index']);
