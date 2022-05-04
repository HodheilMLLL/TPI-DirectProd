<?php
// Démarrage de la session
session_start();

// Récupération de la page actuelle
$page = filter_input(INPUT_GET, 'page') == null ? "home" : filter_input(INPUT_GET, 'page'); // Affichage de la page d'accueil par défaut

if (!isset($_SESSION['actualUser']['isConnected'])) {
    // Session de l'utilisateur
    $_SESSION['actualUser']['isConnected'] = false;
}

// Remise à zero des messages d'erreurs
$_SESSION['messageAlert']['type'] = null;
$_SESSION['messageAlert']['message'] = null;

// Affichage des erreurs
ini_set('display_errors', 1);

// Implémentation des models
include 'models/PDO.php';
include 'models/User.php';

// Affichage du header
include 'vues/header.php';

// Gestion des affichages
switch ($page) {
    case 'home': // Accueil
        include 'vues/home.php';
        break;
    case 'register': // Inscription
        include 'controllers/register_controller.php';
        break;
    case 'login': // Connexion
        include 'controllers/login_controller.php';
        break;
    case 'details': // Détails
        include 'controllers/details_controller.php';
        break;
    case 'profile': // Profil
        include 'controllers/profile_controller.php';
        break;
    case 'myAdverts': // Mes annonces
        include 'controllers/userAdvertsController/myAdverts_controller.php';
        break;
    case 'newAdvert': // Nouvelle annonce
        include 'controllers/userAdvertsController/newAdvert_controller.php';
        break;
    case 'editAdvert': // Modification d'une annonce
        include 'controllers/userAdvertsController/editAdvert_controller.php';
        break;
    case 'adminAdverts': // Administration - Gestion des annonces
        include 'controllers/adminController/adminAdvertManagement_controller.php';
        break;
    case 'adminUsers': // Administration - Gestion des utilisateurs
        include 'controllers/adminController/adminUserManagement_controller.php';
        break;
    default:
        include 'vues/error404.php';
        break;
}

// Affichage du footer
include 'vues/footer.php';

error_reporting(E_ALL); // Affiche toutes les erreurs (facilite le développement)