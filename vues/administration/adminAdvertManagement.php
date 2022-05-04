<!-- Start My Advertisements -->
<style>
    /* Permet d'aligner la dernière colonne sur la droite */
    #myAdvertsTable tbody tr td:last-child {
        white-space: nowrap;
        width: 1%
    }
</style>
<div class="container py-5">
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
            <tr>
                <td scope="row">Pommes</td>
                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error, animi eligendi voluptates porro, temporibus voluptatem fugiat quaerat velit rerum vero repudiandae sed iste dignissimos dolorem excepturi quisquam distinctio iure consectetur!</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-warning" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="index.php?page=editAdvert&action=show&idAdvert=1"><button type="button" class="btn btn-success" id=""><i class="fa fa-check"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-times"></i></button>
                </td>
            </tr>
            <tr>
                <td scope="row">Patates</td>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni quia, ad, reiciendis dolores beatae dignissimos consequuntur vero, repellat ab provident incidunt voluptatibus in quibusdam. Assumenda iure adipisci sed minus nobis.</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-warning" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="index.php?page=editAdvert&action=show&idAdvert=1"><button type="button" class="btn btn-success" id=""><i class="fa fa-check"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-times"></i></button>
                </td>
            </tr>
            <tr>
                <td scope="row">Oranges</td>
                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto esse, corrupti, nostrum expedita odio ullam distinctio nihil exercitationem veniam optio et, deserunt minus ducimus sed modi voluptas consectetur incidunt!</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-warning" id=""><i class="fa fa-eye"></i></button></a>
                    <a href="index.php?page=editAdvert&action=show&idAdvert=1"><button type="button" class="btn btn-success" id=""><i class="fa fa-check"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-times"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->