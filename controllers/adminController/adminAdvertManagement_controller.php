<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/administration/adminAdvertManagement.php';
        break;
    case 'validate': // Validation de l'annonce
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        Advert::validateAdvert($idAdvert);
        include 'vues/administration/adminAdvertManagement.php';
        break;
    case 'reject': // Rejection de l'annonce
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        Advert::rejectAdvert($idAdvert);
        include 'vues/administration/adminAdvertManagement.php';
        break;
}
