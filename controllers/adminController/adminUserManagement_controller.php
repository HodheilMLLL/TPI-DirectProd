<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/administration/adminUserManagement.php';
        break;
    case 'promote': // Promotion de l'utilisateur
        $idUser = filter_input(INPUT_GET, 'idUser');

        User::promoteUser($idUser);
        include 'vues/administration/adminUserManagement.php';
        break;
    case 'demote': // Rétrogradation de l'utilisateur
        $idUser = filter_input(INPUT_GET, 'idUser');

        User::demoteUser($idUser);
        include 'vues/administration/adminUserManagement.php';
        break;
}
