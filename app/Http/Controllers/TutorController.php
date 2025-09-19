<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTutorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function register(CreateTutorRequest $request)
    {
        try {
            $v = $request->validated();
            $user = DB::transaction(function () use ($v, $request) {
                $user = User::create([
                    "name" => $v["name"],
                    "email" => $v["email"],
                    "password" => Hash::make($v["password"]),
                    "role" => "tutor",
                    "telephone" => $v["telephone"],
                    "document" => $v["document"]
                ]);

                $user->address()->create($v["address"]);

                foreach ($v["pets"] as $i => $pet) {
                    $file = $request->file("pets.$i.image");
                    if ($file) {
                        $pet["image"] = Storage::disk("public")->put("pets", $file);
                    }
                    $user->pets()->create($pet);
                }

                return $user;
            });

            Auth::login($user);
            $request->session()->regenerate();

            return to_route('home');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            dd($request->validated());
            return to_route('register.tutor')->withErrors(['error' => 'Ocorreu um erro ao registrar o tutor. Por favor, tente novamente.']);
        }
    }
}
