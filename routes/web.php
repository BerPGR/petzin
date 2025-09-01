<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home');

Route::inertia('/not-found', 'NotFound')->name('notfound');

Route::inertia('/contact', 'Contact')->name('contact');

Route::inertia('/login', 'Auth/Login')->name('login');

Route::inertia('/petshop', 'Petshop')->name('petshop');
