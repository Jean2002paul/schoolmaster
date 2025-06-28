<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SchoolMaster Admin - @yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
        }
        header {
            background: #1abc9c;
            padding: 1rem 2rem;
            color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-wrap: wrap;
        }
        main {
            flex-grow: 1;
            padding: 2rem;
            background: #ecf0f1;
            overflow-y: auto;
        }
        footer {
            background: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 0.5rem;
            font-size: 0.8rem;
        }
        .logout-link {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-left: 1rem;
            transition: color 0.3s;
            white-space: nowrap;
        }
        .logout-link:hover {
            color: #e74c3c; /* Rouge doux au survol */
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                justify-content: center;
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }
            .logout-link {
                margin: 0.5rem 0 0 0;
            }
            main {
                padding: 1rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <a href="{{ route('logout') }}"
           class="logout-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt"></i> Déconnexion
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} SchoolMaster Admin. Tous droits réservés.
    </footer>

    @stack('scripts')
</body>
</html>
