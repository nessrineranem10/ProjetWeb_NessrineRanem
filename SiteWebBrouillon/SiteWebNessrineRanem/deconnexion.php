<?php 

session_destroy();

$_SESSION['isLogin'] = false;

header('Location: ACCUEIL.php');