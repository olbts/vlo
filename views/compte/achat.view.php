
    
        
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
                </div>
            </div>
        </div>
   

     
