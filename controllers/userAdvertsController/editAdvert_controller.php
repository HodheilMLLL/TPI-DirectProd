<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * editAdvert_controller.php - Contrôleur de la page de modification d'annonce 
 */

// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/userAdverts/editAdvert.php';
        break;
    case 'submit': // Mise à jour de l'annonce
        // Lancement de la transaction
        MonPdo::getInstance()->beginTransaction();

        try {
            // Récupération des données
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $isOrganic = filter_input(INPUT_POST, 'isOrganic', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $idAdvert = filter_input(INPUT_POST, 'idAdvert', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $idUser = $_SESSION['actualUser']['idUser'];

            // Variables
            $dossier = 'uploads';
            $taille_maxi = 15000000; // 15Mo en octets
            $taille_tout = 0; // Taille de tous les fichiers que l'utilisteur veut uploader
            $taille_maxi_tout = 200000000; // 200Mo en octets
            $extensions = array('.png', '.jpg', '.jpeg');
            $createdFiles = array();

            unset($erreur);

            // Vérification du produit bio
            if ($isOrganic != null) {
                $isOrganic = 1; // Produit bio
            } else {
                $isOrganic = 0; // Produit non bio
            }

            // Modification de l'annonce
            $advert = new Advert();
            $advert->setTitle($title);
            $advert->setDescription($description);
            $advert->setIsOrganic($isOrganic);
            $advert->setIdUser($idUser);
            Advert::updateAdvert($advert, $idAdvert);
            
            // Traitement des images
            $countfiles = count(array_filter($_FILES['myImg']['name']));

            for ($i = 0; $i < $countfiles; $i++) {
                $fichier = $_FILES['myImg']['name'][$i];
                $taille = filesize($_FILES['myImg']['tmp_name'][$i]);
                $taille_tout += $taille;

                $extension = strrchr($fichier, '.');

                if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                    $erreur = 'Vous devez uploader un fichier de type png, jpg ou jpeg';
                    // Annulation de la transaction
                    throw new Exception;
                }
                if ($taille > $taille_maxi) {
                    $erreur = "Taille de fichier(s) dépassant la limite";
                    // Annulation de la transaction
                    throw new Exception;
                }

                if (!isset($erreur)) // S'il n'y a pas d'erreur, on upload
                {
                    $temp = explode(".", $_FILES["myImg"]["name"][$i]);
                    $newfilename = round(microtime(true)) . $i . '.' . end($temp);
                    if (move_uploaded_file($_FILES['myImg']['tmp_name'][$i], "$dossier/" . $newfilename)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    {
                        // Ajout du fichier dans le tableau des fichiers créés
                        array_push($createdFiles, $newfilename);

                        // Insertion de l'image dans la base de données
                        $picture = new Picture();
                        $picture->setPath($newfilename);
                        $picture->setIdAdvert($idAdvert);
                        Picture::addPicture($picture);

                    } else //Sinon (la fonction renvoie FALSE).
                    {
                        // Annulation de la transaction
                        throw new Exception;
                    }
                }
            }

            // Vérification du non-dépassement de la limite de 200Mo
            if ($taille_tout > $taille_maxi_tout) {
                // Annulation de la transasction
                $erreur = "Fichier(s) trop lourd(s)";
                throw new Exception;
            }
        } catch (\Throwable $th) {
            // Si une erreur est rencontrée, annulation de la transaction
            MonPdo::getInstance()->rollBack();
        }

        try {
            // Validation de la transaction
            MonPdo::getInstance()->commit();

            $_SESSION['messageAlert']['type'] = "success";
            $_SESSION['messageAlert']['message'] = "L'annonce à été mise à jour !";

            // Redirection
            header('Location: index.php?page=myAdverts&action=show');
        } catch (\Throwable $th) {
            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = $erreur;

            // Suppression des fichiers qui ont été crées
            foreach ($createdFiles as $file) {
                unlink("$dossier/" . $file);
            }

            // Redirection en cas d'erreur
            include 'vues/userAdverts/editAdvert.php';
        }        
        break;
    case 'deletePicture': // Suppression d'une image
        // Récupération des données
        $idPicture = filter_input(INPUT_GET, 'idPicture');
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');

        // Récupère les informations de l'image
        $picture = Picture::getPictureById($idPicture);

        // Lancement de la transaction
        MonPdo::getInstance()->beginTransaction();

        try {
            // Suppression de l'image dans le dossier uploads
            unlink("uploads/" . $picture->getPath());

            // Suppression de l'image
            Picture::deletePictureById($picture->getIdPicture());
            
        } catch (\Throwable $th) {
            // Si une erreur est rencontrée, annulation de la transaction
            MonPdo::getInstance()->rollBack();
        }

        try {
            // Validation de la transaction
            MonPdo::getInstance()->commit();

            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "success";
            $_SESSION['messageAlert']['message'] = "Image supprimée avec succès";
        } catch (\Throwable $th) {
            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = "Erreur lors de la suppression de l'image";
        }

        header('Location: index.php?page=editAdvert&action=show&idAdvert=' . $idAdvert . '');         
        break;
}
