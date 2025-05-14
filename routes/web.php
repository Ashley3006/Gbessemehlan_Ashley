<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OeuvreController;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

// Afficher la liste des catégories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

// Afficher le formulaire d’ajout
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');

// Enregistrer une nouvelle catégorie (formulaire POST)
Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories.store');

// Afficher le formulaire de modification
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');

// Mettre à jour une catégorie
Route::put('/categories/{id}/update', [CategorieController::class, 'update'])->name('categories.update');

// Supprimer une catégorie
Route::delete('/categories/{id}/delete', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Afficher la liste des œuvres
Route::get('/oeuvres', [OeuvreController::class, 'index'])->name('oeuvres.index');

// Afficher le formulaire d’ajout d’une œuvre
Route::get('/oeuvres/create', [OeuvreController::class, 'create'])->name('oeuvres.create');

// Enregistrer une nouvelle œuvre
Route::post('/oeuvres/store', [OeuvreController::class, 'store'])->name('oeuvres.store');

// Afficher le formulaire de modification
Route::get('/oeuvres/{id}/edit', [OeuvreController::class, 'edit'])->name('oeuvres.edit');

// Mettre à jour l’œuvre
Route::put('/oeuvres/{id}/update', [OeuvreController::class, 'update'])->name('oeuvres.update');

// Supprimer une œuvre
Route::delete('/oeuvres/{id}/delete', [OeuvreController::class, 'destroy'])->name('oeuvres.delete');
