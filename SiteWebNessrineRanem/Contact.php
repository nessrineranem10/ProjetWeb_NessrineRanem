<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Besoin d'Aide ? Nous sommes là pour vous</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
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
            <input type="search" name="q" placeholder="Recherche" aria-label="Recherche">
        </form>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-xl-2 py-5">
            <h1>Formulaire de contact</h1>
            <p class="lead">Voici où nous contacter en cas de demande de renseignement.</p>

            <form id="contact-form" method="post" action="Contact.php" role="form">
                <div class="messages"></div>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Nom *</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Veuillez entrer votre nom *" required data-error="Nom est obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Prénom *</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Veuillez entrer votre prénom *" required data-error="Prénom est obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Veuillez entrer votre email *" required data-error="Un email valide est obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need">Veuillez préciser votre besoin *</label>
                                <select id="form_need" name="need" class="form-control" required data-error="Veuillez préciser votre besoin.">
                                    <option value="" disabled selected>Choisissez une option</option> <!-- Ajout d'un texte par défaut -->
                                    <option value="Demande de devis">Demande de devis</option>
                                    <option value="Demande générale">Demande générale</option>
                                    <option value="Demander une facture">Demander une facture</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Votre message *" rows="4" required data-error="Veuillez remplir le champ Message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Envoyer">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted">
                                <strong>*</strong> Ces champs sont obligatoires.
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col-xl-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" crossorigin="anonymous"></script>

</body>
</html>