<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadoraController; 
use App\Http\Controllers\PartitController; 

;


Route::get('/', fn() => "Benvingut a la Guia d'Equips i Estadis!");

Route::get('/estadis', [EstadiController::class, 'index'])->name('estadis.index');

Route::get('/estadis/create', [EstadiController::class, 'create'])->name('estadis.create');
Route::post('/estadis', [EstadiController::class, 'store'])->name('estadis.store');
Route::get('/estadis/{id}', [EstadiController::class, 'show'])->name('estadis.show');

Route::get('/jugadoras', [JugadoraController::class, 'index'])->name('jugadoras.index');

Route::get('/jugadoras/create', [JugadoraController::class, 'create'])->name('jugadoras.create');
Route::post('/jugadoras', [JugadoraController::class, 'store'])->name('jugadoras.store');
Route::get('/jugadoras/{id}', [JugadoraController::class, 'show'])->name('jugadoras.show');

Route::get('/partits', [PartitController::class, 'index'])->name('partits.index');

Route::get('/partits/create', [PartitController::class, 'create'])->name('partits.create');
Route::post('/partits', [PartitController::class, 'store'])->name('partits.store');
Route::get('/partits/{id}', [PartitController::class, 'show'])->name('partits.show');

Route::resource('equips', EquipController::class);

