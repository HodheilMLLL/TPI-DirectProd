<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * home.php - page d'accueil
 */
?>
    <!-- Start Advertisements -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <h1 class="h1">Annonces</h1>
                <div class="col-lg-6 m-auto">
                    <form class="col-md-9 m-auto" method="post" action="index.php?page=home&action=search" role="form">
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="inputMobileSearch" name="search" placeholder="Rechercher..." value="<?php if (isset($search)) {
                                                                                                                                                echo $search;
                                                                                                                                            } ?>">
                            <button type="submit" class="input-group-text bg-success text-light">
                                <i class="fa fa-fw fa-search text-white"></i>
                            </button>
                        </div>
                        <h3 class="h3">Recherche avancée</h3>
                        <div class="input-group mb-4">
                            <select class="form-select" aria-label="Default select example" name="slNote">
                                <option value="default" selected>Note minimum</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="slOrganic">
                                <option value="default" selected>Bio ou non</option>
                                <option value="1">Bio</option>
                                <option value="0">Non bio</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($search)) {
                    $allAdverts = Advert::searchAdvert($search, $slOrganic);
                } else {
                    $allAdverts = Advert::getAllValidAdverts();
                }
                
                foreach ($allAdverts as $advert) {

                    $idAdvert = $advert->getIdAdvert();

                    $countRates = Rate::countRatingByAdvertId($idAdvert);
                    if ($countRates != 0) {
                        // Calcul de la moyenne des avis
                        $rates = Rate::getRatesByAdvertId($idAdvert);
                        $totalRating = 0;
                        foreach ($rates as $rate) {
                            $totalRating += $rate->getRating();
                        }
                        $rating = round($totalRating / $countRates, 1); // Note arrondie

                        $stars = floor($rating); // Arrondi de la moyenne

                        if (isset($slNote)) {
                            if ($rating >= $slNote) {
                                $canBeDisplayed = true;
                            } else {
                                $canBeDisplayed = false;
                            }
                        }                        
                    } else {
                        $canBeDisplayed = false;
                    }
                    if (!isset($slNote) || $slNote == "default") {
                        $canBeDisplayed = true;
                    }

                    if ($canBeDisplayed) {

                        // Récupère les informations de l'utiisateur de l'annonce
                        $user = User::getUserByAdvertId($idAdvert);

                        // Récupère les images de l'annonce
                        $pictures = Picture::getPicturesByAdvertId($idAdvert);

                        if (count($pictures) == 0) {
                            $defaultPicture = "default.png";
                        } else {
                            $defaultPicture = $pictures[0]->getPath();
                        }

                        echo '<div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="index.php?page=details&action=show&idAdvert=' . $idAdvert . '">
                                    <img src="uploads/' . $defaultPicture . '" class="card-img-top" alt="Image d\'annonce" height="250">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>';



                        if ($countRates != 0) {
                            // Affichage dynamique des étoiles
                            for ($i = 0; $i < $stars; $i++) {
                ?>
                                <i class="text-warning fa fa-star"></i>
                            <?php
                            }
                            for ($i = 0; $i < 5 - $stars; $i++) {
                            ?>
                                <i class="text-muted fa fa-star"></i>
                <?php
                            }
                            echo $rating;
                        } else {
                            echo "Aucun avis";
                        }

                        echo '</li>';
                        if ($advert->getIsOrganic() == 1) {
                            echo '<li class="text-right">Bio</li>';
                        }
                        echo '</ul><p class="text-muted">' . $user->getCity() . ', ' . $user->getCanton() . '</p>
                                    
                                    <a class="h2 text-decoration-none text-dark">' . $advert->getTitle() . '</a>';

                        echo '<p class="card-text">
                                        ' . $user->getDescription() . '
                                    </p>
                                    <ul class="list-unstyled d-flex justify-content-between mt-auto mb-0">
                                    <li>
                                    <p class="text-muted">Avis (' . $countRates . ')</p>
                                    </li>
                                    <li><a href="index.php?page=details&action=show&idAdvert=' . $idAdvert . '"><button type="button" class="btn btn-success" id="idAdvertisement">Détails</i></button></a></li>
                                    </ul>
                                </div>
                            </div>
                            </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Advertisements -->