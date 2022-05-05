<!-- Start My Advertisements -->
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
    <a href="index.php?page=newAdvert&action=show" style="float: right;"><button type="button" class="btn btn-success" id=""><i class="fa fa-plus"></i> Nouvelle annonce</button></a>
    <!-- Trier : alphabétiquement, statut (Publié, En attente) -->
    <table class="table table-striped" id="myAdvertsTable">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Statut</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $myAdverts = Advert::getAdvertsByUserId($_SESSION['actualUser']['idUser']);
            foreach ($myAdverts as $advert) {

                echo '<tr>
            <td scope="row">' . $advert->getTitle() . '</td>
            <td>';
                if ($advert->getIsValid() == 0) {
                    echo "En attente de validation";
                } 
                elseif ($advert->getIsValid() == 1) {
                    echo "Publié";
                }
                else {
                    echo "Refusé";
                }
                echo '</td>
            <td>
                <a href="index.php?page=details&action=show&idAdvert=' . $advert->getIdAdvert() . '"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye"></i></button></a>
                <a href="index.php?page=editAdvert&action=show&idAdvert=' . $advert->getIdAdvert() . '"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalSuppression" onClick="ChangeDeleteId(' . $advert->getIdAdvert() . ')">
                <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>';
            }

            ?>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->

<!-- Modal de suppression de post -->
<div class="modal fade" id="ModalSuppression" tabindex="-1" aria-labelledby="ModalSuppression" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette annonce ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a id="btnDelete" href="#"><button type="button" class="btn btn-danger">Supprimer</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal de suppression de post -->

<script type="text/javascript">
    /**
     * Modifie le lien du bouton suppression de la modal	
     *
     * @return void
     */
    function ChangeDeleteId(idAdvert) {
        document.getElementById('btnDelete').href = "index.php?page=myAdverts&action=delete&idAdvert=" + idAdvert;
    }
</script>