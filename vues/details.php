<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="assets/img/product_single_10.jpg" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_01.jpg" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">Titre</h1>
                        <p class="h3 py-2">$25.00</p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">4.8 | 24 Avis</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Bio:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>Oui</strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Provenance :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>Lausanne, Vaud</strong></p>
                            </li>
                        </ul>

                        <h6>Producteur:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Pseudo</li>
                            <li>Email</li>
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
// Afficahge du formulaire d'évaluation seulement si l'utilisateur est connecté
if ($_SESSION['actualUser']['isConnected'] == true) { 
?>
<div class="container py-5">
    <!-- Bouton d'affichage du formulaire d'avis -->
        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#ratingForm" aria-expanded="false" aria-controls="ratingForm">
            Laisser un avis
        </button>
    <div class="collapse row py-5" id="ratingForm">
        <form class="col-md-9 m-auto" method="post" role="form">
            <div class="w-25 mb-3">
                <label for="rate" style="flex: 0 1 100px;">Note</label>
                <input type="number" min="1" max="5" class="form-control mt-1" id="rate" name="rate" placeholder="Note">
            </div>
            <div class="mb-3">
                <label for="comment">Commentaire</label>
                <textarea class="form-control mt-1" id="comment" name="comment" placeholder="Commentaire" rows="8"></textarea>
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

<!-- Start Avis -->
<div class="container pb-5">
    <div class="col-12 col-md-10 mx-auto">
        <h1 class="h1">Avis</h1>
        <div class="card mb-3">
            <div class="card-body">
                <ul class="list-unstyled d-flex justify-content-between">
                    <li>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <span class="list-inline-item text-dark"> 4</span>
                    </li>
                    <li class="text-muted text-right">Mardi 03 Mai</li>
                </ul>
                <a class="h2 text-decoration-none text-dark">Michel</a>
                <p class="card-text">
                    Super produit :)
                </p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <ul class="list-unstyled d-flex justify-content-between">
                    <li>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <span class="list-inline-item text-dark"> 2</span>
                    </li>
                    <li class="text-muted text-right">Jeudi 28 Avril</li>
                </ul>
                <a class="h2 text-decoration-none text-dark">Kevin</a>
                <p class="card-text">
                    Nul.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Close Avis -->