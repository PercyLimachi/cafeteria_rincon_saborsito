<?php

use App\Livewire\CatalogoProductos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogo', CatalogoProductos::class,)->name('catalogo');