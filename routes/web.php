<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CepController;

Route::inertia('/', 'Home')->name('home');

Route::inertia('/not-found', 'NotFound')->name('notfound');

Route::inertia('/contact', 'Contact')->name('contact');

Route::inertia('/login', 'Auth/Login')->name('login');

Route::inertia('/petshop', 'Petshop')->name('petshop');

Route::inertia('/register/petshop','Auth/RegisterPetshop')->name('register.petshop');

Route::inertia('/register/tutor','Auth/RegisterTutor')->name('register.tutor');

Route::get('/cep/{cep}', [CepController::class, 'show']);