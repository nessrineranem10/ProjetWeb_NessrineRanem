<?php
session_name('projet');

// Connexion à la base de données
try {
    // Informations de connexion
    $hostname = "mysql-3il.alwaysdata.net";
    $dbname = "3il_projetweb";
    $username = "3il_nessrine";
    $password = "Nessrine10102003";

    // Établir la connexion PDO
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

// Logique pour ajouter un produit
if (isset($_POST['insert_product'])) {
    $product_reference = $_POST['product_reference'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_type = $_POST['product_type'];
    $product_prix = $_POST['product_prix'];

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "";
        $target_file = $target_dir . basename($_FILES['product_image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['product_image']['tmp_name']);
        if ($check !== false) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageFileType, $allowed_extensions)) {
                if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                    $image_name = basename($_FILES['product_image']['name']);
                    $stmt = $conn->prepare("INSERT INTO Produits (reference, nom, description, photo, type, prix) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$product_reference, $product_name, $product_description, $image_name, $product_type, $product_prix]);

                    header('Location: Administrateur.php');
                    exit;
                } else {
                    echo "<p style='color: red;'>Erreur lors du téléchargement de l'image.</p>";
                }
            } else {
                echo "<p style='color: red;'>Seuls les formats JPG, JPEG, PNG et GIF sont autorisés.</p>";
            }
        } else {
            echo "<p style='color: red;'>Le fichier sélectionné n'est pas une image valide.</p>";
        }
    } else {
        echo "<p style='color: red;'>Veuillez choisir une image à télécharger.</p>";
    }
}

// Logique pour supprimer un produit
if (isset($_POST['delete_product'])) {
    $delete_reference = $_POST['delete_reference'];

    // Récupérer le chemin de l'image pour la supprimer
    $stmt = $conn->prepare("SELECT photo FROM Produits WHERE reference = ?");
    $stmt->execute([$delete_reference]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $delete_image = $row['photo'];
        $image_path = "../img/" . $delete_image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Suppression du produit de la base de données
        $stmt = $conn->prepare("DELETE FROM Produits WHERE reference = ?");
        $stmt->execute([$delete_reference]);

        header('Location: Administrateur.php');
        exit;
    }
}

// Logique pour modifier un produit
if (isset($_POST['edit_product'])) {
    $edit_reference = $_POST['edit_reference'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];
    $edit_type = $_POST['edit_type'];
    $edit_prix = $_POST['edit_prix'];

    // Optionnel : si une nouvelle image est fournie, traiter l'image
    if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == 0) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES['edit_image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['edit_image']['tmp_name']);
        if ($check !== false) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageFileType, $allowed_extensions)) {
                if (move_uploaded_file($_FILES['edit_image']['tmp_name'], $target_file)) {
                    $image_name = basename($_FILES['edit_image']['name']);
                    // Mettre à jour avec la nouvelle image
                    $stmt = $conn->prepare("UPDATE Produits SET nom = ?, description = ?, photo = ?, type = ? WHERE reference = ?");
                    $stmt->execute([$edit_name, $edit_description, $image_name, $edit_type, $edit_reference]);
                }
            }
        }
    } else {
        // Mettre à jour sans changer l'image
        $stmt = $conn->prepare("UPDATE Produits SET nom = ?, description = ?, type = ? WHERE reference = ?");
        $stmt->execute([$edit_name, $edit_description, $edit_type, $edit_reference]);
    }

    header('Location: Administrateur.php');
    exit;
}

// Récupération des informations des produits
$products_info = $conn->query("SELECT * FROM Produits");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
  
    <title>Page Administrateur - TechnoSphere</title>
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" type="text/css" href="hamburger.css">
    <link rel="stylesheet" type="text/css" href="Menu.css">
</head>
<body>
    <div class="header">
    <button class="hamburger" onclick="toggleMenu()">☰</button> <!-- Bouton hamburger -->
        <nav>
            <ul class="menu">
                <li><a href="ACCUEIL.php">Accueil</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <h1>Panneau d'administration</h1>
        
        <section class="product-management">
            <h2>Gestion des produits</h2>
            
            <!-- Formulaire pour ajouter un produit -->
            <div id="add-product-form">
                <h3>Ajouter un produit</h3>
                <form method="post" action="" enctype="multipart/form-data">
                    <label for="product_reference">Référence :</label>
                    <input type="text" id="product_reference" name="product_reference" required>
                    <br>
                    <label for="product_name">Nom :</label>
                    <input type="text" id="product_name" name="product_name" required>
                    <br>
                    <label for="product_description">Description :</label>
                    <input type="text" id="product_description" name="product_description" required>
                    <br>
                    <label for="product_image">Choisissez l'image :</label>
                    <input type="file" id="product_image" name="product_image" accept="image/*" required>
                    <br>
                    <label for="product_type">Type :</label>
                    <input type="text" id="product_type" name="product_type" required>
                    <label for="product_name">Prix :</label>
                    <input type="text" id="product_prix" name="product_prix" required>
                    <br>
                    <br>
                    <button type="submit" name="insert_product">Ajouter</button>
                </form>
            </div>

            <h3>Produits existants</h3>
            <table>
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Nom du produit</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $products_info->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['reference']); ?></td>
                            <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Produit"></td>
                            <td><?php echo htmlspecialchars($row['type']); ?></td>
                            <td><?php echo htmlspecialchars($row['prix']); ?></td>
                            <td>
                                <!-- Formulaire pour supprimer un produit -->
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="delete_reference" value="<?php echo htmlspecialchars($row['reference']); ?>">
                                    <button type="submit" name="delete_product">Supprimer</button>
                                </form>

                                <!-- Formulaire pour modifier un produit -->
                                <button onclick="document.getElementById('edit-product-<?php echo htmlspecialchars($row['reference']); ?>').style.display='block'">Modifier</button>
                                <div id="edit-product-<?php echo htmlspecialchars($row['reference']); ?>" style="display:none;">
                                    <h4>Modifier le produit Référence <?php echo htmlspecialchars($row['reference']); ?></h4>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="edit_reference" value="<?php echo htmlspecialchars($row['reference']); ?>">
                                        <label for="edit_name">Nom :</label>
                                        <input type="text" id="edit_name" name="edit_name" value="<?php echo htmlspecialchars($row['nom']); ?>" required>
                                        <br>
                                        <label for="edit_description">Description :</label>
                                        <input type="text" id="edit_description" name="edit_description" value="<?php echo htmlspecialchars($row['description']); ?>" required>
                                        <br>
                                        <label for="edit_image">Nouvelle image (laisser vide si pas de changement) :</label>
                                        <input type="file" id="edit_image" name="edit_image" accept="image/*">
                                        <br>
                                        <label for="edit_type">Type :</label>
                                        <input type="text" id="edit_type" name="edit_type" value="<?php echo htmlspecialchars($row['type']); ?>" required>
                                        <br>
                                        <br>
                                        <label for="edit_type">Prix :</label>
                                        <input type="text" id="edit_prix" name="edit_prix" value="<?php echo htmlspecialchars($row['prix']); ?>" required>
                                        <br>
                                        <button type="submit" name="edit_product">Modifier</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 TechnoSphere. Tous droits réservés.</p>
    </footer>
    <script>
    function toggleMenu() {
        var menu = document.querySelector('.menu');
        menu.classList.toggle('show');
    }
</script>

  
    <script src="script.js"></script> <!-- Lien vers le fichier JavaScript -->
</body>
</html>
