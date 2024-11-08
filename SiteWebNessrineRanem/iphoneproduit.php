<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorez l'Univers Apple : Des produits qui Redéfinissent l'Innovation !</title>
    <!-- Linking the stylesheets (CSS) -->
    <link rel="stylesheet" type="text/css" href="telephone.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
    
</head>
  
<body>
    <!-- Header Section -->
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
   <!-- Phrase d'accroche -->
    <div class="intro">
        <h1>Découvrez l'excellence Apple :</h1>
        <p> Des performances inégalées, un design iconique, et une expérience utilisateur exceptionnelle. Explorez la gamme iPhone et trouvez le modèle qui vous correspond.<p>
    </div>
	
    <?php
        require "./connexionbdd.php";
        $admin = new Admin();
        $result = $admin->getTelephones();

        foreach ($result as $row) {
            echo "<div class='product'>
            <a href='telephone.php?name=" . $row['nom'] . "'>
            <img src='" . htmlspecialchars($row['photo']) . "'alt='Téléphone'/>
            <h1 class='titre'>" . htmlspecialchars($row['nom']) . "</h1></a>"
            
            . "<form action='Mon panier.php'>
                <button type='submit'>Ajouter au panier</button>
                </form>
            </div>";
        }

    ?>
    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <p>Nessrine Ranem</p>
            <p>5 rue de Bruxelles, 12000 Rodez</p>
            <p>07.82.55.70.54</p>
			<a href="login.php">Administrateur</a>
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
