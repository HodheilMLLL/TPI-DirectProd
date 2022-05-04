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
    <h1 class="h1">Gestion des privilèges d'utilisateurs</h1>
    <table class="table table-striped" id="myAdvertsTable">
        <thead>
            <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">Rôle</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">Michel</td>
                <td>Utilisateur</td>
                <td>
                    <a href=""><button type="button" class="btn btn-primary" id="">Promouvoir</button></a>
                </td>
            </tr>
            <tr>
                <td scope="row">Kevin</td>
                <td>Utilisateur</td>
                <td>
                <a href=""><button type="button" class="btn btn-primary" id="">Promouvoir</button></a>
                </td>
            </tr>
            <tr>
                <td scope="row">Admin</td>
                <td>Administrateur</td>
                <td>
                    <a href=""><button type="button" class="btn btn-danger" id="">Rétrograder</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->