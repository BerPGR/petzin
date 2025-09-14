<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTutorRequest;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function register(CreateTutorRequest $request) {
        dd($request->all());
    }
}
