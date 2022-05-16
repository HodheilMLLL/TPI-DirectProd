<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * adminUserManagement.php - page d'administration, gestion des privilèges
 */
?>
<!-- Start My Advertisements -->
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
    <h1 class="h1">Gestion des privilèges d'utilisateurs</h1>
    <table class="table table-striped" id="myAdvertsTable">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Rôle</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $allUsers = User::getAllUsers();
            foreach ($allUsers as $user) {
                echo '<tr>
                <td scope="row">' . $user->getEmail() . '</td>';
                echo '
                <td scope="row">' . $user->getUsername() . '</td>
                <td>';
                if ($user->getIsAdmin() == 0) {
                    echo 'Utilisateur';
                } else {
                    echo 'Administrateur';
                }
                echo '</td>
                <td>';
                if ($user->getIsAdmin() == 0) {
                    echo '<a href="index.php?page=adminUsers&action=promote&idUser=' . $user->getIdUser() . '"><button type="button" class="btn btn-primary" id="">Promouvoir</button></a>';
                } else {
                    echo '<a href="index.php?page=adminUsers&action=demote&idUser=' . $user->getIdUser() . '"><button type="button" class="btn btn-danger" id="">Rétrograder</button></a>';
                }
                echo '</td></tr>';
            }

            ?>
        </tbody>
    </table>
</div>
<!-- End My Advertisements -->