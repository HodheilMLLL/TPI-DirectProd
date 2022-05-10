<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/details.php';
        break;
    case 'submit': // Nouvel avis
        $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $idAdvert = filter_input(INPUT_GET, 'idAdvert');
        $idUser = $_SESSION['actualUser']['idUser'];

        // Vérification
        if ($rating != "" && $comment != "" && $rating <= 5 && $rating >= 0) {
            try {
                $rate = new Rate();
                $rate->setRating($rating);
                $rate->setComment($comment);
                Rate::addRate($rate, $idUser, $idAdvert);
            } catch (\Throwable $th) {
                $_SESSION['messageAlert']['type'] = "danger";
                $_SESSION['messageAlert']['message'] = "Vous avez déjà laissé un avis sur cette annonce";
            }
        } else {
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = "Merci de remplir tous les champs correctement";
        }

        include 'vues/details.php';
        break;
}
