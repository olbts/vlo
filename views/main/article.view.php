
    <!-- <h1>ceci est : <?= $title?></h1> -->
    <?php if(isset($_GET["ajouter"])) :?>
        
        <h5 class="bg-success text-light text-opacity-5">Votre livre a bien été ajouté au panier</h5>
    <?php endif ?>
    <div class="container-fluid">
        <style>
            .img_article{
                width: 80%;
               
            }
        </style>
        <div class="row ">
            <div class="col-12 col-md-4  ">
                <img src="<?=img($article["isbn"])?>" alt="voila" class="m-5 img_article">
            </div>
            <div class="col-12 col-md-4 p-5">
            <h2 class="mb-3"> <?= $article["titre"]?></h2>
            <h5 class="mb-3"> <?= $article["prix"]?>$</h5>
            <h6 class="mb-3">Auteur(s) : <?= $article["auteur"]?></h6>
            <h6 class="mb-3">Isbn : <?= $article["isbn"]?></h6>
            <h6 class="mb-3">Style : <?= $article["style"]?></h6>
            <h6 class="mb-3">Nombre de pages : <?= $article["nb_page"]?></h6>
            <h6 class="mb-3">Date de parution : <?= $article["date_parution"]?></h6>
            </div>
            <div class="col-12 col-md-4 p-5">
            
            <form action="index.php?page=/storeCart" method="post" class="border border-info me-3 text-center">
            <input type="hidden" name="isbn" value="<?=$isbn?>">
            <input type="hidden" id="joy" name="prix" value="<?=$article["prix"]?>">
            <h2 class=" mt-4 "><span class="prix"><?= $article["prix"]?></span>$</h2>
            <p class="text-success mt-2">En stock</p>
            <label for="qte" class="mt-2">Quantité :</label>
            <select name="qte" id="qte" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
    <input type="submit" class="btn btn-info btn-sm my-4" value="Ajouter au panier">
            </form>
            </div>
            <hr>
        </div>
        <div class="row m-0 p-0 ">
            <h3>Description</h3>
            <p class="ms-3"><?= $article["description"]?> </p>
        </div>
        <div class="row">
            <hr>
            <h5>Dans la même catégorie :</h5>
            <div class="flexOther">
            <?php if ($others->set()) : ?>
                
                <div class="row row-cols-1 row-cols-md-4 card-group mt-4 gy-3">
            
            <?php foreach ($others->getArticles() as $key => $value) :    ?>
        <div class="col "> 
        <a href="<?= url("/article",[
                        "isbn" => $value["isbn"],
                    ])?>" class="bref">
            <div class="card   h-100">
            <div class="productImg ">
            <img src="<?= img($value["isbn"])?>" class="card-img-top selfImg" alt="...">
            </div>
    
    <div class="card-body ">
      <h5 class="card-title rawe"><?= $value["titre"]?></h5>
      
      
    </div>
    <p class="card-text text-end px-3"><small class="text-body-secondary"><?= $value["prix"]?>$</small></p>
    
  </div>
        </a>
            </div>
            <?php endforeach; ?>
            
            </div>
            <?php endif ; ?>
            </div>
        </div>
        <div class="row  ">
            <hr>
            <div class="center">
                <h3 class="text-danger mb-2">Commentaires</h3>
                <h4 class="center text-danger"><?= $banner ?? "" ?></h4>
            </div>
            <?php if(estConnecte()) : ?>
            <div class="col-12 col-md-5">
            <p class="ms-3 ">Ajoutez un commentaire : </p>
            
            
            <form action="" method="post">
            <input type="hidden" name="isbn" value="<?=$isbn?>">
        <div class="flexCommentaire">
            <input type="text " name ="titre" placeholder="titre" value='<?= $currentTitre ??""?>'>
            <textarea name="message" id="" cols="10" rows="5" placeholder="message"><?= $currentMessage ??""?></textarea>
            
            <span>
            <label for="">Note :</label>
            <select name="note" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
             </select>
            </span>
             
        </div>
        <div class="right">
            <button type="submit" class="btn btn-success">Envoyer</button>

        </div>
             </form>
            <hr>
            </div>
            <?php  endif ; if(!estConnecte()):?>
                <h6 class="center text-info">Vous devez être connecté pour poster un commentaire</h6>
            <?php endif;?>
        </div>
        <?php if(!empty($commentaires)) : ?>
        <div class="row">
            <div class="col-md-3 center mb-3">
            <span class="sumNote">
            <?= $avgNote?>/5
        </span>
            
        </div>
            <div class="col-12 col-md-9 commentaires">
            <?php foreach ($commentaires as $commentaire) :?>
               <h6><span class="note"><?= $commentaire["note"]?>/5</span>  <?= $commentaire["titre"]?></h6>
               <p><?= $commentaire["message"]?></p>
               
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
   