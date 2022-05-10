<!-- Start Profile -->
<?php
// Si l'utilisateur n'est pas connecté
if ($_SESSION['actualUser']['isConnected'] == false) {
    // Redirection vers la page d'accueil
    header('Location: index.php?page=home&action=show');
}

// Récupération de l'id d'utilisateur qui est stocké en session
$idUser =  $_SESSION['actualUser']['idUser'];

// Récupère les informations de l'utilisateur
$user = User::getUserById($idUser);
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
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="index.php?page=profile&action=submitUpdate" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="username">Pseudo</label>
                    <input type="text" class="form-control mt-1" id="username" name="username" placeholder="Pseudo" value="<?= $user->getUsername() ?>">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control mt-1" id="city" name="city" placeholder="Ville" value="<?= $user->getCity() ?>">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="canton">Canton</label>
                    <input type="text" class="form-control mt-1" id="canton" name="canton" placeholder="Canton" value="<?= $user->getCanton() ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control mt-1" id="postalCode" name="postalCode" placeholder="Code Postal" value="<?= $user->getPostalCode() ?>">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control mt-1" id="address" name="address" placeholder="Adresse" value="<?= $user->getAddress() ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control mt-1" id="description" name="description" placeholder="Description" rows="8"><?= $user->getDescription() ?></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <a href="index.php?page=home&action=show"><button type="button" class="btn btn-secondary btn-lg px-3">Annuler</button></a>
                    <button type="submit" class="btn btn-success btn-lg px-3">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="index.php?page=profile&action=submitNewPassword" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Nouveau mot de passe" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="passwordConfirm">Confirmer nouveau mot de passe</label>
                    <input type="password" class="form-control mt-1" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmer nouveau mot de pase" required>
                </div>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <a href="index.php?page=home&action=show"><button type="button" class="btn btn-secondary btn-lg px-3">Annuler</button></a>
                    <button type="submit" class="btn btn-success btn-lg px-3">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- End Profile -->