<?php
// Démarrage de la session
session_start();

// Récupération de la page actuelle
$page = filter_input(INPUT_GET, 'page') == null ? "home" : filter_input(INPUT_GET, 'page'); // Affichage de la page d'accueil par défaut

// Remise à zero des messages d'erreurs
$_SESSION['messageAlert']['type'] = null;
$_SESSION['messageAlert']['message'] = null;

// Affichage des erreurs
ini_set('display_errors', 1);

// Implémentation des models
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
error_reporting(E_ALL); // Affiche toutes les erreurs (facilite le développement)