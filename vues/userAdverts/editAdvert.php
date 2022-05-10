<!-- Start Edit Advertisement -->
<?php
// Si l'utilisateur n'est pas connecté
if ($_SESSION['actualUser']['isConnected'] == false) {
    // Redirection vers la page d'accueil
    header('Location: index.php?page=home&action=show');
}

// Récupération des données
$idAdvert = filter_input(INPUT_GET, 'idAdvert');

// Récupère les informations de l'annonce
$advert = Advert::getAdvertById($idAdvert);
?>
<div class="container py-5">
    <div class="row py-5">        
        <form class="col-md-9 m-auto" method="post" action="index.php?page=editAdvert&action=submit&idAdvert=<?= $idAdvert ?>" role="form" enctype="multipart/form-data">   
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
            <h1 class="h1">Modifier l'annonce</h1>
            <div class="form-group col-md-6 mb-3">
                <label for="title">Titre</label>
                <input type="text" class="form-control mt-1" id="title" name="title" placeholder="Titre" value="<?= $advert->getTitle() ?>" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="checkbox" class="mt-1" id="isOrganic" name="isOrganic" <?php if ($advert->getIsOrganic() == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                <label for="isOrganic">Bio 🌿</label>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control mt-1" id="description" name="description" placeholder="Description" rows="8" required><?= $advert->getDescription() ?></textarea>
            </div>
            <label>Image(s)</label>
            <?php
            echo '<div class="panel-body">';

            $allPictures = Picture::getPicturesByAdvertId($advert->getIdAdvert());

            foreach ($allPictures as $picture) {
                echo '<div>';
                echo '<img src="uploads/' . $picture->getPath() . '" width="200" style="margin-right: 1rem;"/>';
                echo '<a href="index.php?page=editAdvert&action=deletePicture&idPicture=' . $picture->getIdPicture() . '&idAdvert=' . $advert->getIdAdvert() . '"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>';
                echo '</div><br/>';
            }

            echo '</div>';
            ?>
            <div class="form-group col-md-6 mb-3">
                <label>Nouvelle(s) image(s)</label>
                <input type="file" class="form-control mt-1" name="myImg[]" accept="image/*, video/*, audio/*" multiple>
            </div>
            <input name="idAdvert" type="hidden" value="<?= $idAdvert ?>">
            <div class="row">
                <div class="col text-end mt-2">
                    <a href="index.php?page=myAdverts&action=show"><button type="button" class="btn btn-secondary btn-lg px-3">Annuler</button></a>
                    <button type="submit" class="btn btn-success btn-lg px-3">Enregistrer</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- End Edit Advertisement -->