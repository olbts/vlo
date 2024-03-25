
    
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                <?php require "views/partials/sideCompte.php"?>
                </div>
                <div class="col-md-9 col-12">
                <h3 class="text-info center">Liste des commandes</h3>

                <?php foreach ($commandes->getArticles() as $key => $value) :?>
            <hr>
        <a href="index.php?page=/achat&code=<?= @$value["code"]?>"><p>commande n°<?= @$key + 1?></p></a>
            <hr>
        <?php endforeach ?>
                </div>
            </div>
        </div>
   
