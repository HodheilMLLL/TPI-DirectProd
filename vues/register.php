<!-- Start Register -->
<div class="container py-5">
    <div class="row py-5">

        <form class="col-md-9 m-auto" method="post" action="index.php?page=register&action=registerCheck" role="form">
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
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="username">Pseudo</label>
                    <input type="text" class="form-control mt-1" id="username" name="username" placeholder="Pseudo" value="<?php if (isset($_POST['username'])) {
                                                                                                                                echo $_POST['username'];
                                                                                                                            } ?>">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
                                                                                                                            echo $_POST['email'];
                                                                                                                        } ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control mt-1" id="city" name="city" placeholder="Ville" value="<?php if (isset($_POST['city'])) {
                                                                                                                        echo $_POST['city'];
                                                                                                                    } ?>" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="canton">Canton</label>
                    <input type="text" class="form-control mt-1" id="canton" name="canton" placeholder="Canton" value="<?php if (isset($_POST['canton'])) {
                                                                                                                            echo $_POST['canton'];
                                                                                                                        } ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control mt-1" id="postalCode" name="postalCode" placeholder="Code Postal" value="<?php if (isset($_POST['postalCode'])) {
                                                                                                                                        echo $_POST['postalCode'];
                                                                                                                                    } ?>" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control mt-1" id="address" name="address" placeholder="Adresse" value="<?php if (isset($_POST['address'])) {
                                                                                                                                echo $_POST['address'];
                                                                                                                            } ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="passwordConfirm">Confirmer mot de passe</label>
                    <input type="password" class="form-control mt-1" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmer mot de pase" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Biographie</label>
                <textarea class="form-control mt-1" id="description" name="description" placeholder="Biographie" rows="8"><?php if (isset($_POST['description'])) {
                                                                                                                                echo $_POST['description'];
                                                                                                                            } ?></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">S'inscrire</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Register -->