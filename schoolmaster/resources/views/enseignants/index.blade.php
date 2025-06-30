@extends('layouts.app')

@section('title', 'Gestion des enseignants')

@section('content')
<style>
    .table-wrapper {
        max-width: 1000px;
        margin: auto;
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .table-wrapper h1 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .action-bar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    .action-bar a {
        background: #1abc9c;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
    }
    .action-bar a:hover {
        background: #16a085;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 0.7rem;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background: #3498db;
        color: #fff;
    }
    .action-icons a,
    .action-icons form {
        display: inline-block;
        margin-right: 0.5rem;
    }
    .action-icons i {
        font-size: 1rem;
        cursor: pointer;
    }
    .edit-icon {
        color: #2980b9;
    }
    .delete-icon {
        color: #e74c3c;
        border: none;
        background: none;
        cursor: pointer;
    }
</style>

<div class="table-wrapper">
    <h1><i class="fas fa-chalkboard-teacher"></i> Liste des enseignants</h1>

    <div class="action-bar">
        <a href="{{ route('enseignants.create') }}"><i class="fas fa-plus"></i> Ajouter un enseignant</a>
        <a href="{{ route('dashboard') }}" style="background:#34495e;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Matière</th>
                <th>Classes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enseignants as $enseignant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $enseignant->nom }}</td>
                    <td>{{ $enseignant->prenom }}</td>
                    <td>{{ $enseignant->email }}</td>
                    <td>{{ $enseignant->telephone }}</td>
                    <td>{{ $enseignant->sexe }}</td>
                    <td>{{ $enseignant->matiere }}</td>
                    <td>
                        @foreach($enseignant->classes as $classe)
                            <span>{{ $classe->nom }}</span>{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </td>
                    <td class="action-icons">
                        <a href="{{ route('enseignants.edit', $enseignant->id) }}" title="Modifier">
                            <i class="fas fa-edit edit-icon"></i>
                        </a>
                        <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST" onsubmit="return confirm('Supprimer cet enseignant ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-icon" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center;">Aucun enseignant trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
