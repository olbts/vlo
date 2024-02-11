
    <h5> <?php 
        if (isset($_SESSION["email"])) {
            echo "Bienvenue ".$_SESSION["email"]."!";
        }
        else{
            echo "Vous n'etes pas connecté";
        }
        ?> </h5>
        <hr>
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                <?php require "views/partials/sideCompte.php"?>
                </div>
                <div class="col-9">
                <?php foreach ($commandes->getArticles() as $key => $value) :?>
            <hr>
        <a href="index.php?page=/achat&id_achat=<?= @$value["id_commande"]?>"><p>commande n°<?= @$value["id_commande"]?></p></a>
            <hr>
        <?php endforeach ?>
                </div>
            </div>
        </div>
   
