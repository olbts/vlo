<div class=" bg bg-body-tertiary text-center">
    <h1 class="text-danger">Liste des commandes</h1>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <?php require "views/partials/sideAdmin.php"?>
    </div>
    <div class="col-12 col-md-9">
    
<div class="contain">
    <?php foreach ($retraits as $retrait) : ?>
        <div class="border border-danger commande"><h5> <span class="code">Code : </span> <?= $retrait["code"]?> <span class="prix">Prix : </span>  <?= $retrait["prix_total"]?>$</h5>
            <h6>Adresse Email : <?= $retrait["email"]?></h6>
            <h6>Date commande : <?= $retrait["date_commande"]?></h6>
            <h6>Date maximale retrait : <?= $retrait["date_retrait"]?></h6>
            <table class="border">
                <tr class="border">
                    <th class="border">ISBN</th>
                    <th class="border">Quantité</th>
                    <th class="border">Prix</th>
                </tr>
                <?php $isbn = explode(",", $retrait["qte"]);
                $qte = explode(",", $retrait["qte"]);
                $prix = explode(",", $retrait["prix"]);
                for ($i=0; $i < sizeof($isbn); $i++) { ?>
                <tr>
                    <td class="border"><?=$isbn[$i]?></td>
                    <td class="border"><?=$qte[$i]?></td>
                    <td class="border"><?=$prix[$i]?></td>
                </tr>
                <?php }?>
                    
            </table>
        </div>
    <?php endforeach ?>
    </div>
    </div>
</div>
<style>
    .commande{
        width:fit-content;
        padding:5px;
    }
    .prix{
        color :blueviolet;
    }
    .code{
        color:blue;
    }
    .contain{
        display: flex; 
        flex-wrap: wrap;
    }
</style>



