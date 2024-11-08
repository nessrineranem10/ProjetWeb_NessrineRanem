<?php
// Inclure le fichier de connexion à la base de données
require_once 'connexionbdd.php';

// Initialiser la connexion à la base de données
$db = new Database();
$pdo = $db->getPDO();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $is_admin = 0; // Par défaut à 0

    // Hachage du mot de passe
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

    // Préparation et exécution de la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (login, mdp, is_admin) VALUES (?, ?, ?)");
    
    // Tenter d'exécuter la requête
    if ($stmt->execute([$login, $mdp_hash, $is_admin])) {
        echo "<p style='color:green;'>Compte créé avec succès !</p>";
    } else {
        // Afficher l'erreur
        echo "<p style='color:red;'>Erreur lors de la création du compte : " . implode(", ", $stmt->errorInfo()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scalae=1">
	<link rel="stylesheet" type="text/css" href="nvcompte.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title> L'Aventure Commence Ici : Créez Votre Compte ! </title>
</head>
<body>

	 <div class="header">
     <nav>
     <ul class="menu">
                <li><a href="ACCUEIL.php">Accueil</a></li>
                <li><a href="Contact.php">Nous contacter</a></li>
                <li><a href="Me connecter.php">Se connecter</a></li>
                <li><a href="Mon panier.php">Panier</a></li>
                <link rel="stylesheet" href="print.css" media="print">
            </ul>
        <form>
            <input type="search" name="q" placeholder="Recherche">
        </form>
        </nav>
    </div>

    <div id="container">
            <!-- zone de connexion -->
            
            <form action="Me connecter.php" method="POST">
               <div class="titre">
                <h1>Création de compte</h1>
                <h1 class="titre1">  H :<input type="radio" name="crenligne" value="oui" checked="checked"/ >
                F :<input type="radio" name="crenligne" value="non" /></h1>
                <label><b>login</b></label>
                <input type="text" placeholder="Entrer un Login" name="login" required>

                <label><b>mdp</b></label>
                <input type="text" placeholder="Entrer votre Mot de passe " name="mdp"required>
         
                <input type="submit" id='submit' value='REGISTER' > 
                
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
</body>
</html>