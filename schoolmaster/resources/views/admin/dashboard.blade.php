@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <style>
        .dashboard-card {
            flex: 1 1 200px;
            padding: 1rem;
            border-radius: 6px;
            text-align: center;
            color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
    </style>

    <div style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 100%; max-width: 800px; margin: auto;">
        <h1 style="color: #2c3e50;"><i class="fas fa-user-shield"></i> Bienvenue {{ Auth::user()->name }}</h1>
        <p style="color: #34495e;">Vous êtes connecté sur le tableau de bord administrateur de <strong>SchoolMaster</strong>.</p>

        <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 2rem;">
            <div class="dashboard-card" style="background: #1abc9c;">
                <h2><i class="fas fa-user-graduate"></i></h2>
                <p>Gestion des élèves</p>
            </div>
            <div class="dashboard-card" style="background: #3498db;">
                <h2><i class="fas fa-chalkboard-teacher"></i></h2>
                <p>Gestion des enseignants</p>
            </div>
            <div class="dashboard-card" style="background: #9b59b6;">
                <h2><i class="fas fa-file-invoice-dollar"></i></h2>
                <p>Facturation</p>
            </div>
            <div class="dashboard-card" style="background: #e67e22;">
                <h2><i class="fas fa-chart-line"></i></h2>
                <p>Rapports</p>
            </div>
        </div>
    </div>
@endsection
