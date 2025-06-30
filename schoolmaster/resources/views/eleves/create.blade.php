@extends('layouts.app')

@section('title', 'Ajouter un élève')

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
        padding: 0.6rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 0.8rem;
    }
    .form-wrapper input:focus,
    .form-wrapper select:focus {
        border-color: #1abc9c;
        outline: none;
    }
    .form-wrapper .error {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: -0.5rem;
        margin-bottom: 0.8rem;
    }
    .form-wrapper .btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        margin-right: 0.5rem;
    }
    .btn-save {
        background: #1abc9c;
    }
    .btn-save:hover {
        background: #16a085;
    }
    .btn-back {
        background: #e67e22;
    }
    .btn-back:hover {
        background: #d35400;
    }
</style>

<div class="form-wrapper">
    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:0.8rem 1rem;border-radius:4px;margin-bottom:1rem;border:1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif
    <h1><i class="fas fa-user-plus"></i> Ajouter un élève</h1>

    <form action="{{ route('eleves.store') }}" method="POST">
        @csrf

        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe" required>
                <option value="">Sélectionner le sexe</option>
                <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            </select>
            @error('sexe')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="classe_id">Classe</label>
            <select name="classe_id" id="classe_id" required>
                <option value="">Sélectionner une classe</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
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
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}">
            @error('telephone')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="btn btn-save">
            <i class="fas fa-save"></i> Enregistrer
        </button>
        <a href="{{ route('eleves.index') }}" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </form>
</div>
@endsection
