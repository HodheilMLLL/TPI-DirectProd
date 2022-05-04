<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/userAdverts/editAdvert.php';
        break;
    case 'submit' : // Validation de l'annonce
        echo "Validation de la modification de l'annonce";
        break;
}
