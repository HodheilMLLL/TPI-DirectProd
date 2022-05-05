<!-- Start New Advertisement -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="index.php?page=newAdvert&action=submit" role="form" enctype="multipart/form-data">
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
            <div class="form-group col-md-6 mb-3">
                <label for="title">Titre</label>
                <input type="text" class="form-control mt-1" id="title" name="title" placeholder="Titre" value="<?php if (isset($_POST['title'])) {
                                                                                                                    echo $_POST['title'];
                                                                                                                } ?>" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="checkbox" class="mt-1" id="isOrganic" name="isOrganic" <?php if (isset($_POST['isOrganic'])) {
                                                                                        echo "checked";
                                                                                    } ?>>
                <label for="isOrganic">Bio 🌿</label>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control mt-1" id="description" name="description" placeholder="Description" rows="8" required><?php if (isset($_POST['description'])) {
                                                                                                                                        echo $_POST['description'];
                                                                                                                                    } ?></textarea>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Image(s)</label>
                <input type="file" class="form-control mt-1" name="myImg[]" accept="image/*, video/*, audio/*" multiple>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Soumettre l'annonce</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- End New Advertisement -->