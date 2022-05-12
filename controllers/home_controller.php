<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        unset($search);
        include 'vues/home.php';
        break;    
    case 'search' : // Recherche d'annonces
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        include 'vues/home.php';
        break;
}
