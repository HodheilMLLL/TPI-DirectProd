<!-- Start My Advertisements -->
<style>
    /* Permet d'aligner la dernière colonne sur la droite */
    #myAdvertsTable tbody tr td:last-child {
        white-space: nowrap;
        width: 1%
    }
</style>
<div class="container py-5">
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
            <tr>
                <td scope="row">Pommes</td>
                <td>Publié</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="index.php?page=editAdvert&action=show&idAdvert=1"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td scope="row">Patates</td>
                <td>Publié</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td scope="row">Oranges</td>
                <td>En attente de validation</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->