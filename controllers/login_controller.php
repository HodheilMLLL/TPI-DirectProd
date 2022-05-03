<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/login.php';
        break;    
    case 'connection' : // Connexion
        $_SESSION['actualUser']['isConnected'] = true;
        header('Location: index.php?page=home&action=show');
        break;
    case 'disconnect' : // Déconnexion
        $_SESSION['actualUser']['isConnected'] = false;
        header('Location: index.php?page=home&action=show');
}
