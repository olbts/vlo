<div class=" bg bg-info text-center">
    <h1 class="text-danger">Admin Panel</h1>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <?php require "views/partials/sideAdmin.php"?>
    </div>
    <div class="col-12 col-md-9">
        <h1 class="text-center">Liste Livres</h1>
        <?php  if(isset($_GET["success"])) : ?>
        <h4>ce que vous vouliez faire a bien été fait</h4>
        <?php endif ?>
        <p class="text-end me-5 pe-5"><a class="btn btn-outline-info" href="index.php?page=/ajouterLivre">ajouter un livre</a></p>
            <table>
            <?php foreach ($livres as $livre) : ?>
                <tr>
                    <td><p><?=$livre["titre"]?></td>
                    <td class="px-4"><a href="<?=url($value = "/modifierLivre",$arg=["isbn" => $livre["isbn"]])?>">Modifier</a></td>
                    
                    <td><form action="index.php?page=/supprimerLivre" method="post"><input type="hidden" name="isbn" value="<?=$livre["isbn"]?>"><button class="btn btn-danger">X</button></form></td>
                </tr>
            <?php endforeach ?>
            </table>
        </div>
</div>
