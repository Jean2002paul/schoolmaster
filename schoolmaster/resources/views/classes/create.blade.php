@extends('layouts.app')

@section('title', 'Ajouter une classe')

@section('content')
<style>
    .class-form-wrapper {
        max-width: 400px;
        margin: auto;
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .class-form-wrapper h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    .class-form-wrapper label {
        display: block;
        margin-bottom: 0.3rem;
        font-weight: bold;
        color: #34495e;
    }
    .class-form-wrapper input {
        width: 100%;
        padding: 0.6rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 0.8rem;
    }
    .class-form-wrapper .error {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: -0.4rem;
        margin-bottom: 0.8rem;
    }
    .btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
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

<div class="class-form-wrapper">
    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:0.8rem 1rem;border-radius:4px;margin-bottom:1rem;border:1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif
    <h1><i class="fas fa-school"></i> Ajouter une classe</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf

        <label for="nom">Nom de la classe</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        @error('nom')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-save"><i class="fas fa-save"></i> Enregistrer</button>
        <a href="{{ route('classes.index') }}" class="btn btn-back"><i class="fas fa-arrow-left"></i> Retour</a>
    </form>
</div>
@endsection
