@extends('layouts.app')

@section('title', 'Ajouter un enseignant')

@section('content')
<style>
    .form-wrapper {
        max-width: 500px;
        margin: auto;
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .form-wrapper label {
        display: block;
        margin-bottom: 0.3rem;
        font-weight: bold;
        color: #34495e;
    }
    .form-wrapper input,
    .form-wrapper select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 0.8rem;
    }
    .form-wrapper .error {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 0.2rem;
    }
    .add-btn {
        background: #3498db;
        color: #fff;
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
    }
    .add-btn:hover {
        background: #217dbb;
    }
</style>

<div class="form-wrapper">
    <h1><i class="fas fa-chalkboard-teacher"></i> Ajouter un enseignant</h1>
    <form action="{{ route('enseignants.store') }}" method="POST">
        @csrf

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        @error('nom')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
        @error('prenom')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}">
        @error('telephone')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe" required>
            <option value="">Sélectionner le sexe</option>
            <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
            <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
        </select>
        @error('sexe')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="matiere">Matière / Spécialité</label>
        <input type="text" name="matiere" id="matiere" value="{{ old('matiere') }}" required>
        @error('matiere')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="classes">Classe(s) attribuée(s)</label>
        <select name="classes[]" id="classes" multiple>
            @foreach($classes as $classe)
                <option value="{{ $classe->id }}" {{ (collect(old('classes'))->contains($classe->id)) ? 'selected' : '' }}>
                    {{ $classe->nom }}
                </option>
            @endforeach
        </select>
        @error('classes')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="add-btn"><i class="fas fa-save"></i> Enregistrer</button>
        <a href="{{ route('enseignants.index') }}" class="add-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </form>
</div>
@endsection