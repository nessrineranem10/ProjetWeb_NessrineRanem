<?php
session_start();

// Vérifiez si le panier existe dans la session, sinon créez-le
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Vérifier si le formulaire a été soumis pour ajouter un produit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produit'])) {
    
    // Récupérer les données du formulaire
    $produit = $_POST['produit'];
    $quantite = intval($_POST['quantite']);
    $image = $_POST['image'] ?? 'default.jpeg'; 
    $prix = floatval($_POST['prix']);
   

    // Ajout du produit au panier
    $_SESSION['panier'][] = [
        'produit' => $produit,
        'quantite' => $quantite,
        'image' => $image,
        'prix' => $prix,
        
    ];
}

// Vérifier si le formulaire a été soumis pour supprimer un produit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $index = intval($_POST['index']);
    if (isset($_SESSION['panier'][$index])) {
        // Supprimez le produit du panier
        unset($_SESSION['panier'][$index]);
        // Réindexer le tableau pour éviter des trous
        $_SESSION['panier'] = array_values($_SESSION['panier']);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Le Panier de Vos Rêves : Prêt à Être Rempli !</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mon_panier.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
    <script src="script.js" defer></script>
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

    <!-- Contenu du panier -->
    <div id="panier">
        <h2>Votre panier</h2>
        <?php
        if (count($_SESSION['panier']) > 0) {
            $total = 0;
            foreach ($_SESSION['panier'] as $index => $item) {
                echo "<div class='produit'>";
                $imageSrc = file_exists($item['image']) ? $item['image'] : 'default.jpeg';
                echo "<img src='{$imageSrc}' alt='{$item['produit']}' style='width:100px; height:auto;' />";
                echo "<div>";
                echo "<h3>Produit : {$item['produit']}</h3>";
                echo "<p>Quantité : {$item['quantite']}</p>";
                echo "<p>Prix : {$item['prix']}</p>";
                $total = $total + $item['prix'];
                echo "</div>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='index' value='$index'>";
                echo "<button type='submit' name='supprimer'>Supprimer</button>";
                echo "</form>";
                echo "</div>";
            }
            echo "<div class='total' id='total-panier'>Total : €" . number_format($total, 2, ',', ' ') . "</div>";
        } else {
            echo "<p>Aucun produit dans le panier.</p>";
        }
        ?>
    </div>

    <footer>
        <div class="footer-content">
            <p>Nessrine Ranem</p>
            <p>5 rue de Bruxelles, 12000 Rodez</p>
            <p>07.82.55.70.54</p>
            <a href="login.php" style="color: white;">Administrateur</a>
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


