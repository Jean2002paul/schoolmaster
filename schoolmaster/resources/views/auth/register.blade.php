<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SchoolMaster - Inscription</title>
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
            font-size: 2rem;
        }
        .register-container {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        form {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            width: 300px;
        }
        form h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #4CAF50;
        }
        label {
            display: block;
            margin: 0.5rem 0 0.2rem;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 0.7rem;
            background: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #45a049;
        }
        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
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
        <h1>SchoolMaster</h1>
    </header>

    <div class="register-container">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <h2>Inscription</h2>
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Créer mon compte</button>

            <div class="login-link">
                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></p>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} SchoolMaster. Tous droits réservés.</p>
    </footer>
</body>
</html>
