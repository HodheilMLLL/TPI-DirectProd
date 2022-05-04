<!DOCTYPE html>
<html lang="en">

<head>
    <title>DirectProd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php?page=home&action=show">
                DirectProd
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav -->
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <!-- Implémentation de la logique de navigation en fonction de l'utilisateur actuel -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=home&action=show">Accueil</a>
                        </li>
                        <?php
                        // Si un utilisateur est connecté, affichage de la navigation correspondante
                        if ($_SESSION['actualUser']['isConnected'] == true) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=profile&action=show">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=myAdverts&action=show">Mes annonces</a>
                        </li>    

                        <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          Administration
                        </a>                      
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                          <li><a class="dropdown-item" href="index.php?page=adminAdverts&action=show">Gestion des annonces</a></li>
                          <li><a class="dropdown-item" href="index.php?page=adminUsers&action=show">Gestion des utilisateurs</a></li>
                        </ul>

                      </div>                   
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=login&action=disconnect">Déconnexion</a>
                        </li>';
                        } else {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=login&action=show">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=register&action=show">Inscription</a>
                        </li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
            <!-- End Nav -->

        </div>
    </nav>
    <!-- Close Header -->