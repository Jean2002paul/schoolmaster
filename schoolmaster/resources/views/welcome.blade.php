<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SchoolMaster - Accueil</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
            background: url('https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
        }
        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 2rem 1rem;
            text-align: center;
        }
        header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        header p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        nav a {
            margin: 0 1rem;
            padding: 0.5rem 1rem;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #fff;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }
        nav a:hover {
            background: #fff;
            color: #000;
        }
        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 3rem 1rem;
            background: rgba(0, 0, 0, 0.6);
            flex-grow: 1;
        }
        .features div {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            margin: 1rem;
            padding: 1.5rem;
            border-radius: 12px;
            width: 280px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .features div:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }
        .features h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .features p {
            font-size: 1rem;
        }
        footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue sur <span style="color: #4CAF50;">SchoolMaster</span></h1>
        <p>Gérez votre école en toute simplicité</p>
        <nav>
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
        </nav>
    </header>

    <section class="features">
        <div>
            <h2>📚 Gestion des élèves</h2>
            <p>Suivi des présences, notes, dossiers et progression</p>
        </div>
        <div>
            <h2>👨‍🏫 Gestion des enseignants</h2>
            <p>Organisation des cours, évaluations et emplois du temps</p>
        </div>
        <div>
            <h2>💼 Administration</h2>
            <p>Facturation, communication, bulletins PDF et rapports</p>
        </div>
        <div>
            <h2>📈 Statistiques</h2>
            <p>Visualisez les performances de votre établissement</p>
        </div>
    </section>

    <footer>
        <p>&copy; {{ date('Y') }} SchoolMaster. Tous droits réservés.</p>
    </footer>
</body>
</html>
