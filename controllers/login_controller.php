<?php
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
            $ConnectedUser = User::connect($user);
            
            if ($ConnectedUser != false) {
                $_SESSION['actualUser']['isConnected'] = true;
                $_SESSION['actualUser']['idUser'] = $ConnectedUser->getIdUser();
                // Garder aussi s'il est admin ou non

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
        // $_SESSION['actualUser']['isConnected'] = false;
        session_destroy();
        session_unset();

        // Redirection vers l'acceuil
        header('Location: index.php?page=home&action=show'); 
        break;
}
