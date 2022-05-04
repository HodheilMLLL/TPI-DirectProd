<!-- Start Register -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="index.php?page=register&action=registerCheck" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="username">Pseudo</label>
                    <input type="text" class="form-control mt-1" id="username" name="username" placeholder="Pseudo">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control mt-1" id="city" name="city" placeholder="Ville">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="canton">Canton</label>
                    <input type="email" class="form-control mt-1" id="canton" name="canton" placeholder="Canton">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control mt-1" id="postalCode" name="postalCode" placeholder="Code Postal">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="address">Adresse</label>
                    <input type="email" class="form-control mt-1" id="address" name="address" placeholder="Adresse">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="passwordConfirm">Confirmer mot de passe</label>
                    <input type="password" class="form-control mt-1" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmer mot de pase">
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control mt-1" id="description" name="description" placeholder="Description" rows="8"></textarea>
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