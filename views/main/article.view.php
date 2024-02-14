
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
                <img src="<?=img("gaga")?>" alt="voila" class="m-5 img_article">
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
    
            
            <?php 
        // if (isset($_SESSION["email"])) {
            echo '<input type="submit" class="btn btn-info btn-sm my-4" value="Ajouter au panier">';
        // }
        // else{
        //     echo '<p class="btn btn-info btn-sm my-4">Vous n etes pas connecté</p>';
        // }
        ?>
               
            </form>
            </div>

        </div>
        <div class="row m-0 p-0 ">
            <hr>
            <h3>Description</h3>
            <p class="ms-3"><?= $article["description"]?> </p>
             
            <hr>
        </div>
       
    </div>
    <script> 
        const prix = document.querySelector(".prix");
   const actuel = parseFloat(prix.innerHTML);
      const qte = document.querySelector("#qte");
      const joy = document.querySelector("#joy");
        qte.addEventListener("change",()=>{
          prix.innerHTML =  actuel * parseFloat(qte.value)
          joy.value = actuel * parseFloat(qte.value);
        })
  

    </script>

