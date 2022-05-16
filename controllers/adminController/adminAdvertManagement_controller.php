<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * adminAdvertManagement_controller.php - Contrôleur de la page d'administration, gestion des annonces
 */

// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/administration/adminAdvertManagement.php';
        break;
    case 'validate': // Validation de l'annonce
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        Advert::validateAdvert($idAdvert);

        // Redirection
        header('Location: index.php?page=adminAdverts&action=show');
        break;
    case 'reject': // Rejection de l'annonce
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        Advert::rejectAdvert($idAdvert);

        // Redirection
        header('Location: index.php?page=adminAdverts&action=show');
        break;
}
