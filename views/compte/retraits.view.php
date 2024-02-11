
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
                <div class="col-9 text-center">
                    <h1>Wééééé</h1>
                    <?php if($retraits->set()): ?>
                                        <?php foreach ($retraits->getArticles() as $key => $produit) : ?>
                                    <div class="border-3 border text-center bg-opacity-25 <?= $date_max >  $currentDate ?   "bg-success" :  "bg-danger"?>">
                                           <h1 >Code : <span class="text-info"><?= $produit["code"]?></span></h1> 
                                            ecétou
                                </div>
                    <?php endforeach; ?>
                    <?php endif ; ?>
                </div>
   

                