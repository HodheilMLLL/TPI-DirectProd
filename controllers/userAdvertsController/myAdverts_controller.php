<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * myAdverts_controller.php - Contrôleur de la page affichant les annonces d'un utilisateur
 */

// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/userAdverts/myAdverts.php';
        break;
    case 'delete': // Suppression d'une annonce
        // Récupère l'id de l'annonce à supprimer
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        // Variables
        $dossier = "uploads";

        // Lancement de la transaction
        MonPdo::getInstance()->beginTransaction();

        try {
            // Récupère touts les medias en lien avec ce post
            $allPictures = Picture::getPicturesByAdvertId($idAdvert);

            // Suppression de l'annonce (cela supprimera aussi les images côté bd car la table est ON DELETE CASCADE)
            Advert::deleteAdvertById($idAdvert);

            // Suppression des images dans le dossier uploads            
            foreach ($allPictures as $picture) {
                unlink("$dossier/" . $picture->getPath());
            }
        } catch (\Throwable $th) {
            // Si une erreur est rencontrée, annulation de la transaction
            MonPdo::getInstance()->rollBack();
        }

        try {
            // Validation de la transaction
            MonPdo::getInstance()->commit();

            // Message de réussite
            $_SESSION['messageAlert']['type'] = "success";
            $_SESSION['messageAlert']['message'] = "L'annonce a été supprimée avec succès !";
        } catch (\Throwable $th) {
            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = "Erreur lors de la suppression de l'annonce";
        }

        include 'vues/userAdverts/myAdverts.php';
        break;
}