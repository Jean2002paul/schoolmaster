@extends('layouts.app')

@section('title', 'Modifier un élève')

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
    .form-wrapper h1 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        text-align: center;
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
        box-sizing: border-box;
        margin-bottom: 0.8rem;
    }
    .form-wrapper .error {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 0.2rem;
    }
    .add-btn {
        background: #1abc9c;
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
        background: #16a085;
    }
    .form-wrapper a.add-btn {
        background: #e67e22;
    }
    .form-wrapper a.add-btn:hover {
        background: #d35400;
    }
</style>

<div class="form-wrapper">
    <h1><i class="fas fa-user-edit"></i> Modifier un élève</h1>
    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>  
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $eleve->nom) }}" required>
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $eleve->prenom) }}" required>
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe" required>
                <option value="">Sélectionner le sexe</option>
                <option value="Féminin" {{ old('sexe', $eleve->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                <option value="Masculin" {{ old('sexe', $eleve->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            </select>
            @error('sexe')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="classe_id">Classe</label>
            <select name="classe_id" id="classe_id" required>
                <option value="">Sélectionner une classe</option>
                @foreach(\App\Models\Classe::all() as $classe)
                    <option value="{{ $classe->id }}" {{ old('classe_id', $eleve->classe_id) == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nom }}
                    </option>
                @endforeach
            </select>
            @error('classe_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $eleve->email) }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $eleve->telephone) }}">
            @error('telephone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="add-btn"><i class="fas fa-save"></i> Mettre à jour</button>
        <a href="{{ route('eleves.index') }}" class="add-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </form>
</div>
@endsection
