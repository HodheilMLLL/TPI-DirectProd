<?php

/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * register_controller.php - Contrôleur de la page d'inscription 
 */

// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/register.php';
        break;
    case 'registerCheck': // Vérification de l'inscription
        // Récupération des données
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $canton = filter_input(INPUT_POST, 'canton', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Tableau de traitement d'erreurs
        $erreurs = array();

        // Vérification des champs obligatoires
        if ($password == "" || $passwordConfirm == "" || $email == "" || $city == "" || $canton == "" || $postalCode == "" || $address == "") {
            array_push($erreurs, "Veuillez remplir les champs obligatoires");
        }

        // Si l'email est déjà utilisé
        if (User::emailExists($email)) {
            array_push($erreurs, "L'email est déjà utilisé");
        }

        // Si les mots de passe ne sont pas les mêmes
        if ($password != $passwordConfirm) {
            array_push($erreurs, "Les mots de passe ne sont pas identiques");
        }

        // Mot de passe trop court
        if (strlen($password) < 6) {
            array_push($erreurs, "Mot de passe trop court");
        }

        if (count($erreurs) == 0) {

            // Création de l'utilisateur
            $user = new User();
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setCity($city);
            $user->setCanton($canton);
            $user->setPostalCode($postalCode);
            $user->setAddress($address);
            $user->setDescription($description);
            $idUser = User::addUser($user);

            $_SESSION['actualUser']['isConnected'] = true;
            $_SESSION['actualUser']['idUser'] = $idUser;

            $_SESSION['messageAlert']['type'] = "success";
            $_SESSION['messageAlert']['message'] = "Inscription réussie !";

            header('Location: index.php?page=home&action=show');
        } else {
            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "danger";
            foreach ($erreurs as $erreur) {
                $_SESSION['messageAlert']['message'] .= $erreur . "<br/>";
            }
        }
        include 'vues/register.php';
        break;
}
