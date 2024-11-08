<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoSphere</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="header">
        <nav>
            <button class="hamburger" onclick="toggleMenu()">☰</button> <!-- Bouton hamburger -->
            <ul class="menu">
                <li><a href="ACCUEIL.php" class="active">Accueil</a></li>
                <li><a href="Contact.php">Nous contacter</a></li>
                <?php if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == false): ?>
                    <li><a href="Me connecter.php">Se connecter</a></li>
                <?php else: ?>
                    <li><a href="deconnexion.php">Se déconnecter</a></li>
                <?php endif; ?>
                <li><a href="Mon panier.php">Panier</a></li>
            </ul>
            <form>
                <input type="search" name="q" placeholder="Recherche">
            </form>
        </nav>
    </div>

    <div class="intro">
        <h1>Découvrez le meilleur de la technologie à portée de main !</h1>
        <p>Que vous cherchiez un smartphone dernier cri ou un PC performant, nous avons sélectionné les meilleurs produits pour répondre à tous vos besoins. Offrez-vous l'innovation et la qualité, avec des équipements qui vous ressemblent et des prix qui vous conviennent. Explorez, comparez et choisissez la technologie qui vous accompagnera au quotidien !</p>
    </div>
    
    <div id="main">
        <!-- Sous-titre Produits -->
        <h2 class="title">Produits</h2>

        <!-- Section Téléphone -->
        <div class="product">
            <a href="iphoneproduit.php">
                <img class="left" src="telephone.jpeg" width="370px" alt="Téléphone"/>
            </a>
            <p class="subtitle">Téléphone</p>
        </div>

        <!-- Section PC Bureau avec "INDISPONIBLE" -->
        <div class="product">
            <a href="ProduitPcFixe.html">
                <div class="image-container">
                    <img class="left" src="ordinateurbureau.jpeg" width="370px" alt="PC Bureau"/>
                    <div class="indisponible-overlay">INDISPONIBLE</div>
                </div>
            </a>
            <p class="subtitle">PC Bureau / PC Gamer</p>
        </div>

        <!-- Section PC Portable avec "INDISPONIBLE" -->
        <div class="product">
            <a href="ProduitPcPortable.html">
                <div class="image-container">
                    <img class="left" src="bureauportable.jpeg" width="370px" alt="PC Gamer"/>
                    <div class="indisponible-overlay">INDISPONIBLE</div>
                </div>
            </a>
            <p class="subtitle">PC Portable</p>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>Nessrine Ranem</p>
            <p>5 rue de Bruxelles, 12000 Rodez</p>
            <p>07.82.55.70.54</p>
            <a href="login.php">Administrateur</a>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        function toggleMenu() {
            var menu = document.querySelector('.menu');
            menu.classList.toggle('show');
        }
    </script>
</body>
</html>
