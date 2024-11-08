<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connectez-vous pour Accéder à Votre Univers !</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Lien vers style.css -->
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="stylesheet" href="me connecter.css" media="screen" type="text/css" />
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
</head>
<body>

<div class="header">
    <nav>
        <button class="hamburger" onclick="toggleMenu()">☰</button> <!-- Bouton hamburger -->
        <ul class="menu">
            <li><a href="ACCUEIL.php">Accueil</a></li>
            <li><a href="Contact.php">Nous contacter</a></li>
            <li><a href="Me connecter.php">Se connecter</a></li>
            <li><a href="Mon panier.php">Panier</a></li>
        </ul>
        <form>
            <input type="search" name="q" placeholder="Recherche">
        </form>
    </nav>
</div>

<div id="container">
    <!-- Zone de connexion -->
    <form action="verification.php" method="POST">
        <h1>Connexion</h1>
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>

        <input type="submit" id="submit" value="LOGIN">

        <div class="account-actions">
            <a href="nvcompte.php" class="account-link">Créer un nouveau compte</a>
            <a href="login.php" class="account-link">Administrateur</a>
        </div>
    </form>
</div>

<footer>
    <div class="footer-content">
        <p>Nessrine Ranem</p>
        <p>5 rue de Bruxelles, 12000 Rodez</p>
        <p>07.82.55.70.54</p>
    </div>
</footer>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.menu');
        menu.classList.toggle('show');
    }
</script>

</body>
</html>


