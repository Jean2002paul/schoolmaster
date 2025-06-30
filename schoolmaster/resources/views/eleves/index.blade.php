@extends('layouts.app')

@section('title', 'Gestion des élèves')

@section('content')
<style>
    .filter-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    .filter-bar select,
    .filter-bar input[type="text"] {
        padding: 0.4rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 0.6rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background: #1abc9c;
        color: #fff;
    }
    td .action-icons a,
    td .action-icons button {
        margin-right: 0.3rem;
    }
    .add-btn {
        background: #1abc9c;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
    }
    .add-btn:hover {
        background: #16a085;
    }
    .dashboard-btn {
        background: #34495e;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 1rem;
    }
    .dashboard-btn:hover {
        background: #2c3e50;
    }
    .filter-bar button {
        background: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.4rem 0.8rem;
        cursor: pointer;
    }
    .filter-bar button:hover {
        background: #2980b9;
    }
    .top-bar {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 1rem;
    }
</style>

<div>
    <div class="top-bar">
        <h1 style="color:#2c3e50; margin:0;">
            <i class="fas fa-user-graduate"></i> Gestion des élèves
        </h1>

        <a href="{{ route('dashboard') }}" class="dashboard-btn">
            <i class="fas fa-tachometer-alt"></i> Retour au dashboard
        </a>
    </div>

    <div class="filter-bar">
        <form method="GET" action="{{ route('eleves.index') }}" style="display:flex; gap:0.5rem; flex-wrap:wrap;">
            <select name="classe" onchange="this.form.submit()">
                <option value="">Toutes les classes</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ request('classe') == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nom }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" placeholder="🔍 Rechercher..." value="{{ request('search') }}">
            <button type="submit"><i class="fas fa-filter"></i> Filtrer</button>
        </form>

        <a href="{{ route('eleves.create') }}" class="add-btn"><i class="fas fa-plus"></i> Ajouter un élève</a>
    </div>

    <table>
        <thead>
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-user"></i> Nom</th>
                <th><i class="fas fa-user"></i> Prénom</th>
                <th><i class="fas fa-venus-mars"></i> Sexe</th>
                <th><i class="fas fa-school"></i> Classe</th>
                <th><i class="fas fa-envelope"></i> Email</th>
                <th><i class="fas fa-phone"></i> Téléphone</th>
                <th><i class="fas fa-cogs"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eleves as $eleve)
            <tr>
                <td>{{ $loop->iteration + ($eleves->currentPage()-1)*$eleves->perPage() }}</td>
                <td>{{ $eleve->nom }}</td>
                <td>{{ $eleve->prenom }}</td>
                <td>{{ $eleve->sexe }}</td>
                <td>{{ $eleve->classe->nom }}</td>
                <td>{{ $eleve->email }}</td>
                <td>{{ $eleve->telephone }}</td>
                <td class="action-icons">
                    <a href="{{ route('eleves.edit', $eleve->id) }}" title="Modifier" style="color:#3498db;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer cet élève ?')" style="background:none; border:none; padding:0; cursor:pointer; color:#e74c3c;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center;">Aucun élève trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $eleves->withQueryString()->links() }}
    </div>
</div>
@endsection
