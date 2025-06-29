<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Eleve;

class EleveController extends Controller
{
    /**
     * Affiche la liste des élèves.
     */
    public function index()
    {
        $classes = Classe::all();
        $eleves = Eleve::with('classe')->paginate(10);

        return view('eleves.index', compact('eleves', 'classes'));
    }

    /**
     * Affiche le formulaire de création d'un élève.
     */
    public function create()
    {
        $classes = Classe::all();
        return view('eleves.create', compact('classes'));
    }

    /**
     * Enregistre un nouvel élève.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'classe_id' => 'required|exists:classes,id',
            'email' => 'required|email|max:255|unique:eleves,email',
            'telephone' => 'nullable|max:20',
        ]);

        Eleve::create($validatedData);

        return redirect()->route('eleves.create')->with('success', 'Élève ajouté avec succès.');
    }

    /**
     * Affiche le détail d'un élève.
     */
    public function show($id)
    {
        $eleve = Eleve::with('classe')->findOrFail($id);

        return view('eleves.show', compact('eleve'));
    }

    /**
     * Affiche le formulaire d'édition d'un élève.
     */
    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        $classes = Classe::all();
        return view('eleves.edit', compact('eleve', 'classes'));
    }

    /**
     * Met à jour un élève.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'classe_id' => 'required|exists:classes,id',
            'email' => 'required|email|max:255|unique:eleves,email,' . $id,
            'telephone' => 'nullable|max:20',
        ]);

        $eleve = Eleve::findOrFail($id);
        $eleve->update($validatedData);

        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
    }

    /**
     * Supprime un élève.
     */
    public function destroy($id)
    {
        Eleve::destroy($id);
        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès.');
    }
}
