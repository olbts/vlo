<div class="bg bg-body-tertiary  text-center">
    <h1 class="text-danger">Ajouter Livre</h1>
</div>
<div class="row">
        <div class="col-md-3 col-0">
            <?php require "views/partials/sideAdmin.php"?>
        </div>
        <div class="col-md-6 col-12">
        <div class="">
            <?php if(isset($banner)): ?>
                <h3 class="text-center text-danger"><?= $banner ?></h3>
            <?php endif; ?>
            <form action="index.php?page=/ajouterAuteur" method="post" enctype="multipart/form-data" >
                        <input type="text" name="nom" value='<?= $currentNom ??""?>' placeholder="Nom"><input name="prenom" value='<?= $currentPrenom ??""?>' type="text" placeholder="Prénom">
                        <button class="btn btn-success justify-self-center" type="submit ">Ajouter</button>
                </div>
        </div>
        <div class="col-md-3 col-0">

        </div>
</div>
</form>