<div class=" bg bg-body-tertiary text-center">
    <h1 class="text-danger">Liste des auteurs</h1>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <?php require "views/partials/sideAdmin.php"?>
    </div>
    <div class="col-12 col-md-9">
    <?php  if(isset($_GET["success"])) : ?>
        <h4 class="text-center bg bg-success text-white"><?= $success[$_GET["success"]] ?></h4>
        <?php endif ?>
        <p class="text-end me-5 pe-5"><a class="btn btn-outline-info" href="index.php?page=/ajouterAuteur">ajouter un auteur</a></p>
            <table>
            <?php foreach ($auteurs as $auteur) : ?>
                <tr>
                    <td><p><?=$auteur["nom"]?></td>
                    <td><p><?=$auteur["prenom"]?></td>
                    <td><form action="index.php?page=/supprimerAuteur" method="post"><input type="hidden" name="deleteAuteur" value="<?=$auteur["id_auteur"]?>"><button class="btn btn-danger">X</button></form></td>
                </tr>
            <?php endforeach ?>
            </table>
    </div>
</div>