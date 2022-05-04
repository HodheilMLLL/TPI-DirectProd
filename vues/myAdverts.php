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
    <table class="table table-striped" id="myAdvertsTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Note</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Pommes</td>
                <td>4.7</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Patates</td>
                <td>4.1</td>
                <td><a href="#"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Oranges</td>
                <td>3.6</td>
                <td><a href="#"><button type="button" class="btn btn-primary" id=""><i class="fa fa-pencil"></i></button></a>
                    <button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#ModalSuppression" data-whatever="@mdo" onClick="ChangeModalLink(' . $post->getIdPost() . ')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->