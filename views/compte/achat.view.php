
    
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                <?php require "views/partials/sideCompte.php"?>
                </div>
                <div class="col-9 ">
                    <h3 class="text-info center mb-3">Détails Commande</h3>
                    <p>Date commande : <?= $achat["date_commande"] ?></p>
                    <p>Date maximum retrait : <?= $achat["date_retrait"] ?> </p>
                    <p>Code à remettre : <?= $achat["code"] ?> </p>
                    <p>Adresse : <?= $achat["numero"] ?> <?= $achat["rue"] ?> <?= $achat["ville"] ?> </p>
                    <p>Télephone : <?= $achat["telephone"] ?> </p>
                <!-- <table class="table ">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Quantité</th>
                            
                            <th scope="col">Prix</th>
                            
                            </tr>
                        </thead>
                    <tbody>
                    <?php if($achat->set()): ?>
                                        <?php foreach ($achat->getArticles() as $key => $produit) : ?>
                                            <tr >
                        <th scope="row"><img src="<?= img("gaga")?>" class="img-fluid rounded-start" alt="..." style="width:75px;"></th>
                        <td><?= $produit["titre"]?></td>
                        <td><?php if(isset($produit["auteur"])){
                            echo $produit["auteur"];
                        } else{
                            echo "John Doe";}?></td>
                        <td><?= $produit["qte"] ?></td>
                       
                        <td><span><?= $produit["prix"] ?></span>$</td>
                        
                        </tr>
                                
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                    </tbody>
                                        </table> -->
                </div>
            </div>
        </div>
   

     
