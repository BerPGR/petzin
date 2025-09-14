<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CepController;

Route::middleware('auth')->group(function () {
    Route::inertia('/', 'Home')->name('home');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
});

Route::post('/register-tutor', [App\Http\Controllers\TutorController::class, 'register'])->name('register.tutor');

Route::inertia('/welcome', 'Welcome')->name('welcome');

Route::inertia('/not-found', 'NotFound')->name('notfound');

Route::inertia('/contact', 'Contact')->name('contact');

Route::inertia('/login', 'Auth/Login')->name('login');

Route::inertia('/petshop', 'Petshop')->name('petshop');

Route::inertia('/register/petshop','Auth/RegisterPetshop')->name('register.petshop');

Route::inertia('/register/tutor','Auth/RegisterTutor')->name('register.tutor');

Route::get('/cep/{cep}', [CepController::class, 'show']);

Route::fallback(function () {
    return to_route('notfound');
});