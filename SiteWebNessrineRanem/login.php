
<?php
session_name('projet');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
</head>
<body>

    <header class="header">
        <h1>Connexion Administrateur</h1>
    </header>

    <main id="main-content">
        <div class="intro">
            <h2>Accédez à votre panneau de contrôle</h2>
            <p>Veuillez entrer vos identifiants pour continuer.</p>
        </div>

        <form action="verification.php" id="login-form" class="login-form" onsubmit="return handleLogin(event)">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" required>
            </div>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
    </main>

    <footer>
        <div class="footer-content">
            <p>© 2024 Votre site web. Tous droits réservés.</p>
        </div>
    </footer>

    <script>function handleLogin(e){e.preventDefault();const n=document.getElementById("username").value,t=document.getElementById("password").value;"admin"===n&&"admin"===t?window.location.href="Administrateur.php":alert("Identifiants invalides. Veuillez réessayer.")}</script>


</body>
</html>
