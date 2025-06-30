<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Classe;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::with('classes')->get();
        return view('enseignants.index', compact('enseignants'));
    }

    public function create()
    {
        $classes = Classe::all();
        return view('enseignants.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:enseignants,email',
            'telephone' => 'nullable|string|max:20',
            'sexe' => 'required|in:Masculin,Féminin',
            'matiere' => 'required|string|max:255',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        $enseignant = Enseignant::create($request->only([
            'nom', 'prenom', 'email', 'telephone', 'sexe', 'matiere'
        ]));

        if ($request->has('classes')) {
            $enseignant->classes()->sync($request->classes);
        }

        return redirect()->route('enseignants.index')->with('success', 'Enseignant ajouté avec succès.');
    }

    public function edit(Enseignant $enseignant)
    {
        $classes = Classe::all();
        $enseignant->load('classes');
        return view('enseignants.edit', compact('enseignant', 'classes'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:enseignants,email,' . $enseignant->id,
            'telephone' => 'nullable|string|max:20',
            'sexe' => 'required|in:Masculin,Féminin',
            'matiere' => 'required|string|max:255',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        $enseignant->update($request->only([
            'nom', 'prenom', 'email', 'telephone', 'sexe', 'matiere'
        ]));

        if ($request->has('classes')) {
            $enseignant->classes()->sync($request->classes);
        } else {
            $enseignant->classes()->detach();
        }

        return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès.');
    }

    public function destroy(Enseignant $enseignant)
    {
        $enseignant->classes()->detach();
        $enseignant->delete();

        return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès.');
    }
}
