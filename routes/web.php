<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaliteController;
use App\Http\Controllers\VisiteurController;

// Route d'accueil redirigeant vers la page d'accueil si authentifié
Route::get('/', [HomeController::class, 'index'])->middleware('auth');

// Ressources des entités
Route::resource('localites', LocaliteController::class);
Route::resource('visiteurs', VisiteurController::class);

// Page de login avec redirection si déjà connecté
Route::get('/login', function () {
    return Auth::check() ? redirect('/') : view('auth.login');
})->name('login');

// Dashboard (si nécessaire)
Route::get('/dashboard', function () {
    return view('dashboard'); // Assurez-vous que dashboard.blade.php existe
})->middleware('auth')->name('dashboard');

// Groupe de routes protégées pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusion des routes d'authentification Breeze
require __DIR__.'/auth.php';
