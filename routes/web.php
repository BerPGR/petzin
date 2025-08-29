<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Contact')->name('home');

Route::inertia('/not-found', 'NotFound')->name('notfound');
