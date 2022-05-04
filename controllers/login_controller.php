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
        // Déconnexion de l'utilisateur
        $_SESSION['actualUser']['isConnected'] = false;

        // Redirection vers la page où l'utilisateur se trouvait précédemment
        header('Location: index.php?page=home&action=show'); 
}
