<!-- Start End Admin Advertisements Management -->
<?php
// Si l'utilisateur n'est pas admin
if ($_SESSION['actualUser']['isAdmin'] != 1) {
    // Redirection vers la page d'accueil
    header('Location: index.php?page=home&action=show');
}
?>
<style>
    /* Permet d'aligner la dernière colonne sur la droite */
    #myAdvertsTable tbody tr td:last-child {
        white-space: nowrap;
        width: 1%
    }
</style>
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
    <!-- Trier : alphabétiquement, statut (Publié, En attente) -->
    <h1 class="h1">Annonces en attente de validation</h1>
    <table class="table table-striped" id="myAdvertsTable">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allInvalidAdverts = Advert::getAllInvalidAdverts();
            foreach ($allInvalidAdverts as $invalidAdvert) {
                $idAdvert = $invalidAdvert->getIdAdvert();
                echo '<tr>
                <td scope="row">' . $invalidAdvert->getTitle() . '</td>
                <td>' . $invalidAdvert->getDescription() . '</td>
                <td>
                    <a href="index.php?page=details&action=show&idAdvert=' . $idAdvert . '"><button type="button" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>
                    <a href="index.php?page=adminAdverts&action=validate&idAdvert=' . $idAdvert . '"><button type="button" class="btn btn-success"><i class="fa fa-check"></i></button></a>
                    <a href="index.php?page=adminAdverts&action=reject&idAdvert=' . $idAdvert . '"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                </td>
            </tr>';
            }

            ?>
        </tbody>
    </table>
</div>
<!-- End Admin Advertisements Management -->