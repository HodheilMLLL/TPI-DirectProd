<?php
session_start();
$page = filter_input(INPUT_GET, 'page') == null ? "home" : filter_input(INPUT_GET, 'page'); // affiche la page accueil par défaut

$_SESSION['messageAlert']['type'] = null;
$_SESSION['messageAlert']['message'] = null;

ini_set('display_errors', 1);


include 'models/PDO.php';


// Affichage du header
include 'vues/header.php';


// Gestion des affichages
switch ($page) {
    case 'home': // Affichage de la page d'accueil
        include 'vues/home.php';
        break;
}

// afichage du footer
include 'vues/footer.php';
error_reporting(E_ALL);
