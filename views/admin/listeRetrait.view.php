<h1>Liste des commandes</h1>
<ul>
    <?php foreach ($retraits as $retrait) : ?>
        <li><h5>Code : <?= $retrait["code"]?> Prix : <?= $retrait["prix_total"]?></h5>
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
        </li>
    <?php endforeach ?>
</ul>