@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<style>
    .dashboard-card {
        flex: 1 1 200px;
        padding: 1.5rem;
        border-radius: 8px;
        text-align: center;
        color: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-decoration: none;
    }
    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    .dashboard-icon {
        font-size: 3rem;
        margin-bottom: 0.5rem;
    }
    .dashboard-text {
        font-size: 1.2rem;
        font-weight: 600;
    }
    .dashboard-container {
        max-width: 900px;
        margin: 2rem auto;
        background: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }
    .dashboard-header {
        color: #2c3e50;
        margin-bottom: 1rem;
        text-align: center;
    }
    .dashboard-subheader {
        color: #34495e;
        text-align: center;
        margin-bottom: 2rem;
        font-size: 1rem;
    }
    .dashboard-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
    }
</style>

<div class="dashboard-container">
    <h1 class="dashboard-header"><i class="fas fa-user-shield"></i> Bienvenue {{ Auth::user()->name }}</h1>
    <p class="dashboard-subheader">
        Vous êtes connecté sur le tableau de bord administrateur de <strong>SchoolMaster</strong>.
    </p>

    <div class="dashboard-grid">
        <a href="{{ route('eleves.index') }}" class="dashboard-card" style="background: #1abc9c;">
            <div class="dashboard-icon"><i class="fas fa-user-graduate"></i></div>
            <div class="dashboard-text">Gestion des élèves</div>
        </a>

        <a href="{{ route('classes.index') }}" class="dashboard-card" style="background: #27ae60;">
            <div class="dashboard-icon"><i class="fas fa-school"></i></div>
            <div class="dashboard-text">Gestion des classes</div>
        </a>

        <a href="{{ route('enseignants.index') }}" class="dashboard-card" style="background: #3498db;">
            <div class="dashboard-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            <div class="dashboard-text">Gestion des enseignants</div>
        </a>

        <a href="#" class="dashboard-card" style="background: #9b59b6;">
            <div class="dashboard-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="dashboard-text">Facturation</div>
        </a>

        <a href="#" class="dashboard-card" style="background: #e67e22;">
            <div class="dashboard-icon"><i class="fas fa-chart-line"></i></div>
            <div class="dashboard-text">Rapports</div>
        </a>
    </div>
</div>
@endsection
