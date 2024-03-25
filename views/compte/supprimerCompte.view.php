
<div class="container-fluid">
            <div class="row">
                <div class="col-3">
                <?php require "views/partials/sideCompte.php"?>
                </div>
                <div class="col-9">
                <h1 class="center text-danger mb-5">Supprimer Compte</h1>
                <p class="center mb-5">Attention cette action est irréversible et entrainera la suppression de toutes vos informations personnelles</p>
                <form action="" method="post">
                    <input type="hidden" name="supprimer" value="supprimer">
                    <div class="center">
                    <button type="submit" class="btn btn-danger  alignCenter center">Supprimer</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
     