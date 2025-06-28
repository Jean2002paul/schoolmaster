<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirige selon le rôle
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }

            // Redirige prof ou eleve vers une page dédiée si besoin
            return redirect('/'); // À adapter selon ton besoin
        }

        // Si échec
        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->onlyInput('email');
    }
}
