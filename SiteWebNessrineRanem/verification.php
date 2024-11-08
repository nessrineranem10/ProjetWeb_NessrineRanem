<?php

try {
    // Informations de connexion
    $hostname = "mysql-3il.alwaysdata.net";
    $dbname = "3il_projetweb";
    $username = "3il_nessrine";
    $password = "Nessrine10102003";

    // Établir la connexion PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

// Requête pour vérifier les identifiants dans la table admin
$sql = "SELECT * FROM Utilisateur WHERE login = :login AND mdp = :mdp";
$stmt = $pdo->prepare($sql);

// Exécution de la requête avec les données fournies
$stmt->execute([
    'login' => $_POST['login'],
    'mdp' => $_POST['mdp'] // Pensez à sécuriser les mots de passe avec un hachage
]);

$var = $stmt->fetchAll();

if (! empty($var)) {
    session_name('projet');
    $_SESSION['isLogin'] = true;
    echo $_SESSION['isLogin'];

    // Vérifier si l'utilisateur est un administrateur
    if (!empty($var['admin']) && $var['admin'] == true) {
        $_SESSION['isAdmin'] = true;
        header('Location: Administrateur.php');
    } else {
        $_SESSION['isAdmin'] = false;
        header('Location: ACCUEIL.php');
    }
} else {
    echo 'Login ou mot de passe incorrect';
    header('Location: Me connecter.php');
}