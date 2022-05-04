<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/register.php';
        break;
    case 'registerCheck' : // Vérification de l'inscription

        // Vérification

        break;
}
