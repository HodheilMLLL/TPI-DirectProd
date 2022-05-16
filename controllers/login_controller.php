<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * login_controller.php - Contrôleur de la page de connexion 
 */

// Récupération de l'action
$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'show': // Affichage de la page
        include 'vues/login.php';
        break;    
    case 'connection' : // Connexion
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        // Vérification
        if ($email != "" && $password != "") {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $connectedUser = User::connect($user);
            
            if ($connectedUser != false) {
                $_SESSION['actualUser']['isConnected'] = true;
                $_SESSION['actualUser']['idUser'] = $connectedUser->getIdUser();
                if ($connectedUser->getIsAdmin() == 1) {
                    $_SESSION['actualUser']['isAdmin'] = true;
                } else {
                    $_SESSION['actualUser']['isAdmin'] = false;
                }

                // Redirection
                header('Location: index.php?page=home&action=show');
            } else {
                $_SESSION['messageAlert']['type'] = "danger";
                $_SESSION['messageAlert']['message'] = "Email ou mot de passe incorrect";
            }
        } else {
            $_SESSION['messageAlert']['type'] = "danger";
            $_SESSION['messageAlert']['message'] = "Merci de remplir tous les champs";           
        }
        include 'vues/login.php';
        break;
    case 'disconnect' : // Déconnexion
        // Déconnexion de l'utilisateur
        session_destroy();
        session_unset();

        // Redirection vers la page de connexion
        header('Location: index.php?page=login&action=show'); 
        break;
}
