<?php
// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/register.php';
        break;
    case 'registerCheck': // Vérification de l'inscription

        // Lancement de la transaction
        MonPdo::getInstance()->beginTransaction();

        unset($erreur);
        try {
            // Récupération des données
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $canton = filter_input(INPUT_POST, 'canton', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $isAdmin = filter_input(INPUT_POST, 'isAdmin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Si l'email est déjà utilisé
            if (User::emailExists($email)) {
                $erreur = "L'email est déjà utilisé";

                // Annulation de la transaction
                throw new Exception;
            }

            // Si les mots de passe ne sont pas les mêmes
            if ($password != $passwordConfirm) {
                $erreur = "Les mots de passe ne sont pas identiques";

                // Annulation de la transaction
                throw new Exception;
            }

            // Mot de passe trop court
            if (strlen($password) < 6) {
                $erreur = "Mot de passe trop court";

                // Annulation de la transaction
                throw new Exception;
            }

            // Création de l'utilisateur
            $user = new User();
            $user->setPassword(User::sha256Converter($password));           
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setCity($city);
            $user->setCanton($canton);
            $user->setPostalCode($postalCode);
            $user->setAddress($address);
           
            $user->setDescription($description);
            $idUser = User::addUser($user);
            
        } catch (\Throwable $th) {
            // Si une erreur est rencontrée, annulation de la transaction
            MonPdo::getInstance()->rollBack();
        }

        try {
            // Validation de la transaction
            MonPdo::getInstance()->commit();

            $_SESSION['actualUser']['isConnected'] = true;
            $_SESSION['actualUser']['idUser'] = $idUser;

            $_SESSION['messageAlert']['type'] = "success";
            $_SESSION['messageAlert']['message'] = "Inscription réussie !";

            header('Location: index.php?page=home&action=show');
        } catch (\Throwable $th) {
            // Affichage d'un message d'erreur
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = $erreur;
        }
        include 'vues/register.php';
        break;
}
