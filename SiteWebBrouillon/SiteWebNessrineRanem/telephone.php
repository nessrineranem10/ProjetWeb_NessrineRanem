<?php
require "./connexionbdd.php";

// Initialiser la variable pour éviter les erreurs si aucun produit n'est trouvé
$product = null;

if (isset($_GET['name'])) {
    $admin = new Admin();
    $result = $admin->getTelephones();

    foreach ($result as $row) {
        if ($row['nom'] == $_GET['name']) {
            $product = $row;
            break; // Arrêtez la boucle une fois le produit trouvé
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="telephone.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
    <script src="script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
    <title>Produit - <?php echo htmlspecialchars($product['nom'] ?? "Produit non trouvé"); ?></title>
</head>
<body>
    <div class="header">
    <button class="hamburger" onclick="toggleMenu()">☰</button> <!-- Bouton hamburger -->
        <nav>
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

    <?php if ($product): ?>
        <!-- Slider Section -->
        <div class="slider">
            <div class="slides">
            <img src="<?php echo htmlspecialchars($product['photo']); ?>" alt="Téléphone" />

            </div>
            <button class="nav-button prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="nav-button next" onclick="changeSlide(1)">&#10095;</button>
        </div>

        <div class="PREMIEREIMAGE">
            <h1 class="titre"><?php echo htmlspecialchars($product['nom']); ?></h1>
            <form action="Mon panier.php" method="post">
    <input type="hidden" name="produit" value="<?php echo htmlspecialchars($product['nom']); ?>">
    <input type="hidden" name="quantite" value="1">
    <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['photo']); ?>"> <!-- Ajout de l'image -->
    <input type="hidden" name="prix" value="<?php echo htmlspecialchars($product['prix']); ?>">
    <div style="text-align: center;">
    <p class="product-price"><?php echo htmlspecialchars($product['prix']); ?> €</p>
</div>
    <input type="submit" value="Ajouter au panier">
</form>
        </div>

        <!-- Section Description -->
        <div class="description-section">
            <h1>Description</h1>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
        </div>

    <?php else: ?>
        <!-- Message si aucun produit n'est trouvé -->
        <h1>Produit non trouvé</h1>
        <p>Désolé, le produit demandé n'est pas disponible.</p>
    <?php endif; ?>

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
