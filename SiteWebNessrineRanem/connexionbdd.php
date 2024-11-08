<?php
class Database {
    private $pdo;

    public function __construct() {
        try {
            // Informations de connexion
            $hostname = "mysql-3il.alwaysdata.net";
            $dbname = "3il_projetweb";
            $username = "3il_nessrine";
            $password = "Nessrine10102003";

            // Établir la connexion PDO
            $this->pdo = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer l'instance PDO
    public function getPDO() {
        return $this->pdo;
    }
}

class Admin {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Database())->getPDO();
    }

    // Méthode pour vérifier les identifiants de connexion
    public function login($login, $mdp) {
        // Requête pour vérifier les identifiants dans la table admin
        $sql = "SELECT * FROM utilisateur WHERE login = :login AND mdp = :mdp";
        $stmt = $this->pdo->prepare($sql);

        // Exécution de la requête avec les données fournies
        $stmt->execute([
            'login' => $login,
            'mdp' => $mdp // Pensez à sécuriser les mots de passe avec un hachage
        ]);

        // Retourner vrai si un résultat est trouvé
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTelephones() 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Produits WHERE type ='Téléphone'");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
