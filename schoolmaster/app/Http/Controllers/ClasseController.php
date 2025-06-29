<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:classes,nom',
        ]);
        Classe::create($request->only('nom'));
        return redirect()->route('classes.create')->with('success', 'Classe ajoutée avec succès.');
    }

    public function edit(Classe $classe)
    {
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:classes,nom,' . $classe->id,
        ]);
        $classe->update($request->only('nom'));
        return redirect()->route('classes.index')->with('success', 'Classe modifiée avec succès.');
    }

    public function destroy(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
    }
}