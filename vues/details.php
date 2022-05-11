<?php
// Récupération des données
$idAdvert = filter_input(INPUT_GET, 'idAdvert');

// Récupération des informations de l'annonce
$advert = Advert::getAdvertById($idAdvert);
$advertUser = User::getUserByAdvertId($idAdvert);
$pictures = Picture::getPicturesByAdvertId($idAdvert);

if (count($pictures) == 0) {
    $defaultPicture = "default.png";
} else {
    $defaultPicture = $pictures[0]->getPath();
}


// Variables
$countPic = 0;
$totalPic = count($pictures);
$firstSlide = true;
?>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="uploads/<?= $defaultPicture ?>" alt="Image" id="product-detail">
                </div>
                <div class="row">
                    <?php
                    if (count($pictures) != 0) {
                    ?>
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    <?php
                    }
                    ?>
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">

                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">
                            <?php
                            for ($i = 0; $i < $totalPic / 3; $i++) {
                                echo '<div class="carousel-item';
                                if ($firstSlide == true) {
                                    echo " active";
                                    $firstSlide = false;
                                }
                                echo '">
                                <div class="row">';
                                for ($j = 0; $j < 3; $j++) {
                                    if ($countPic < $totalPic) {
                                        echo '<div class="col-4">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="uploads/' . $pictures[$countPic]->getPath() . '" alt="Image">
                                    </a>
                                    </div>';
                                    }
                                    $countPic++;
                                }
                                echo '</div></div>';
                            }
                            ?>
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <?php
                    if (count($pictures) != 0) {
                    ?>
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $advert->getTitle() ?></h1>
                        <p class="py-2">
                        <?php
                                $countRates = Rate::countRatingByAdvertId($idAdvert);
                                if ($countRates != 0) {

                                    // Calcul de la moyenne des avis
                                    $rates = Rate::getRatesByAdvertId($idAdvert);
                                    $totalRating = 0;
                                    foreach ($rates as $rate) {
                                        $totalRating += $rate->getRating();
                                    }
                                    $rating = round($totalRating / $countRates, 1);
                                    $stars = floor($rating); // Arrondi de la moyenne
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
                                    echo $rating . ' | <span class="list-inline-item text-dark">' . $countRates . ' Avis</span>';
                                } else {
                                    echo "Aucun avis";
                                }
                                ?>                            
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Bio:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?php if ($advert->getIsOrganic() == 1) {
                                                                    echo "Oui";
                                                                } else {
                                                                    echo "Non";
                                                                } ?></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p><?= $advert->getDescription() ?></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Provenance :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $advertUser->getCity() ?>, <?= $advertUser->getCanton() ?></strong></p>
                            </li>
                        </ul>

                        <h6>Informations producteur:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Pseudo : <?= $advertUser->getUsername() ?></li>
                            <li>Email : <?= $advertUser->getEmail() ?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Rating -->
<?php
// Afficahge du formulaire d'évaluation seulement si l'utilisateur est connecté et si l'utilsateur actuel n'est pas le créateur de l'annonce
if ($_SESSION['actualUser']['isConnected'] == true && $advertUser->getIdUser() != $_SESSION['actualUser']['idUser']) {
?>
    <div class="container py-5">
        <?php
        // message de confirmation
        if ($_SESSION['messageAlert']['type'] != null) {
        ?>
            <div class="alert alert-<?= $_SESSION['messageAlert']['type'] ?>" role="alert">
                <?= $_SESSION['messageAlert']['message'] ?>
            </div>
        <?php
            $_SESSION['messageAlert']['type'] = null;
            $_SESSION['messageAlert']['message'] = null;
        }
        ?>
        <!-- Bouton d'affichage du formulaire d'avis -->
        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#ratingForm" aria-expanded="false" aria-controls="ratingForm">
            Laisser un avis
        </button>
        <div class="collapse row py-5" id="ratingForm">
            <form class="col-md-9 m-auto" method="post" action="index.php?page=details&idAdvert=<?= $idAdvert ?>&action=submit" role="form">

                <div class="w-25 mb-3">
                    <label for="rating" style="flex: 0 1 100px;">Note</label>
                    <input type="number" min="1" max="5" class="form-control mt-1" id="rating" name="rating" placeholder="Note" required>
                </div>
                <div class="mb-3">
                    <label for="comment">Commentaire</label>
                    <textarea class="form-control mt-1" id="comment" name="comment" placeholder="Commentaire" rows="8" required></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Publier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>
<!-- Close Rating -->

<?php
$rates = Rate::getRatesByAdvertId($idAdvert);

if (count($rates) != 0) {
?>
    <!-- Start Avis -->
    <div class="container pb-5">
        <div class="col-12 col-md-10 mx-auto">
            <h1 class="h1 mt-3">Avis</h1>
            <?php
            foreach ($rates as $rate) {
                $rating = $rate->getRating();
                $rateUser = User::getUserByRateAdvertId($idAdvert, $rate->getIdUser());
            ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <?php
                                // Affichage dynamique des étoiles
                                for ($i = 0; $i < $rating; $i++) {
                                ?>
                                    <i class="text-warning fa fa-star"></i>
                                <?php
                                }
                                for ($i = 0; $i < 5 - $rating; $i++) {
                                ?>
                                    <i class="text-muted fa fa-star"></i>
                                <?php
                                }
                                ?>

                                <span class="list-inline-item text-dark"> <?= $rating ?></span>
                            </li>
                            <li class="text-muted text-right"><?= $rate->getDate() ?></li>
                        </ul>
                        <a class="h2 text-decoration-none text-dark"><?= $rateUser->getUsername() ?></a>
                        <p class="card-text">
                            <?= $rate->getComment() ?>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Close Avis -->
<?php
}
?>