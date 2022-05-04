<!-- Start Login -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="index.php?page=login&action=connection" role="form">
            <div class="row">
            <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control mt-1" id="password" name="password" placeholder="Mot de passe">
                </div>
                
            </div>            
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Connexion</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Login -->