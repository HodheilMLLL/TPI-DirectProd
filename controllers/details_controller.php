<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/details.php';
        break;    
    case 'submit' : // Nouvel avis
        echo "submit rating";
        include 'vues/details.php';
        break;
}
