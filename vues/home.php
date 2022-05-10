    <!-- Start Advertisements -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <h1 class="h1">Annonces</h1>
                <div class="col-lg-6 m-auto">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Rechercher...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php

                $allValidAdverts = Advert::getAllValidAdverts();

                foreach ($allValidAdverts as $advert) {

                    $idAdvert = $advert->getIdAdvert();
                    // Récupère les informations de l'utiisateur de l'annonce
                    $user = User::getUserByAdvertId($idAdvert);

                    // Récupère les images de l'annonce
                    $pictures = Picture::getPicturesByAdvertId($idAdvert);

                    echo '<div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="index.php?page=details&action=show&idAdvert=' . $idAdvert . '">
                                    <img src="uploads/' . $pictures[0]->getPath() . '" class="card-img-top" alt="Image d\'annonce">
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                        </li>
                                        <li class="text-muted text-right">' . $user->getCity() . ', ' . $user->getCanton() . '</li>
                                    </ul>
                                    <a class="h2 text-decoration-none text-dark">'. $advert->getTitle() . '</a>';
                                    if ($advert->getIsOrganic() == 1) {
                                        echo " (Bio)";
                                    }
                                    echo '<p class="card-text">
                                        ' . $advert->getDescription() . '
                                    </p>
                                    <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                    <p class="text-muted">Avis (24)</p>
                                    </li>
                                    <li><a href="index.php?page=details&action=show&idAdvert=' . $idAdvert . '"><button type="button" class="btn btn-success" id="idAdvertisement">Détails</i></button></a></li>
                                    </ul>
                                </div>
                            </div>
                            </div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Advertisements -->