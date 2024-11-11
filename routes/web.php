<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');

Route::get('/pets', [PetController::class, 'index'])->name('pets.index');

Route::post('/pets', [PetController::class, 'store'])->name('pets.store');

// Formularz wyszukiwania
Route::get('/pets/search', [PetController::class, 'searchForm'])->name('pets.searchForm');

// Wyszukiwanie po ID i statusie
Route::get('/pets/search/results', [PetController::class, 'search'])->name('pets.search');


Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.show');


Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');

Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');

Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');

