<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;

// Route pour afficher le formulaire de connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route pour traiter le formulaire de connexion (POST)
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');

// Route pour afficher le formulaire d'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Route pour traiter le formulaire d'inscription (POST)
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Route de déconnexion
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


Route::resource('eleves', EleveController::class);

Route::resource('classes', ClasseController::class)
    ->parameters(['classes' => 'classe']);
