<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/home.php';
        break;    
    case 'search' : // Recherche d'annonces

        // à compléter

        include 'vues/home.php';
        break;
}
