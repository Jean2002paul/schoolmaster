@extends('layouts.app')

@section('title', 'Gestion des classes')

@section('content')
<style>
    .classes-wrapper {
        max-width: 600px;
        margin: auto;
        background: #fff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .add-btn, .dashboard-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
        margin-bottom: 1rem;
    }
    .add-btn {
        background: #1abc9c;
    }
    .add-btn:hover {
        background: #16a085;
    }
    .dashboard-btn {
        background: #34495e;
        margin-left: 0.5rem;
    }
    .dashboard-btn:hover {
        background: #2c3e50;
    }
    table {
        width: 100%;
        border-collapse: collapse;
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
    .action-icons a, .action-icons button {
        margin-right: 0.5rem;
        font-size: 1rem;
    }
    .action-icons a {
        color: #3498db;
    }
    .action-icons a:hover {
        color: #2980b9;
    }
    .action-icons button {
        background: none;
        border: none;
        color: #e74c3c;
        cursor: pointer;
    }
    .action-icons button:hover {
        color: #c0392b;
    }
</style>

<div class="classes-wrapper">
    <h1><i class="fas fa-school"></i> Gestion des classes</h1>

    <a href="{{ route('classes.create') }}" class="add-btn">
        <i class="fas fa-plus"></i> Ajouter une classe
    </a>
    <a href="{{ route('dashboard') }}" class="dashboard-btn">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($classes as $classe)
                <tr>
                    <td>{{ $classe->id }}</td>
                    <td>{{ $classe->nom }}</td>
                    <td class="action-icons">
                        <a href="{{ route('classes.edit', $classe->id) }}" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cette classe ?')" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center;">Aucune classe trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
