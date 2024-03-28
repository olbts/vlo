<div class="container-fluid">
    <div class="row">

        <div class="col-12 col-md-9">
                
                    <?php if($panier->set()): ?>
                      <table class="table ">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur(s)</th>
                            <th scope="col">Quantité</th>
                            
                            <th scope="col">Prix</th>
                            
                            </tr>
                        </thead>
                    <tbody>
                                        <?php foreach ($panier->getArticles() as $key => $produit) : ?>
                                            <tr >
                       
                        <th scope="row"><img src="<?= img($produit["isbn"])?>" class=" panier_img " alt="..." style="width:60px;"></th>
                        <td><?= $produit["titre"]?></td>
                        <td><?= $produit["auteur"] ?></td>
                        <td><form action="index.php?page=/updateCart" method="post" class="allQteForm" ><input min="1" max="5"   type="number" name="qte" value="<?= $produit["qte"] ?>" class="allQte"><input type="hidden" name="isbn"  value="<?= $produit["isbn"] ?>"></form></td>
                        <td><span><?= $produit["prixtotal"] ?></span>$</td>
                        <td><form action="index.php?page=/destroyCart" method="post">
                          <input type="hidden" name="isbn" value ="<?= $produit["isbn"]?>">
                        <input type="submit" value="X" class="btn btn-outline-danger">
                        </form></td>
                        </tr>
                        
                                
                    <?php endforeach; ?>
                    </tbody>
                                        </table>
                    <?php endif; ?>
                    
                    
                  <?php if(!$panier->set()): ?>
                    <div class="text-center">
                    <h3 class=" mt-5 py-5">Votre panier est vide</h3>
                    <p class="mt-2"><a href="index.php">Continuer mes achats</a></p>

                    </div>
                  <?php endif; ?>
        </div>
     

<div class="col-12 col-md-3  p-5   text-center">
<h2 class=" mt-4 mb-3"><span class="prix"><?= $prixtotal??"0"   ?></span>$</h2>
                
    <?php 
        if (isset($_SESSION["email"])) : ?>
        <form action="index.php?page=/retirer" method="post">
        <select name="boutique" id="">
          <?php foreach ($boutiques as $boutique) : ?>
            
            <option value="<?= $boutique["id_boutique"]?>">
            <?= $boutique["numero"]?> <?= $boutique["rue"]?> <?= $boutique["ville"]?>
          </option>
          <?php endforeach ?>
        </select><br><br>
        <button class="btn btn-danger btn-xl mb-3" type="submit" data-bs-toggle="modal" data-bs-target="#retirerModal">
        <b> Retirer en magasin </b>
        </button>
           
    <br>
           
    <p class="text-danger text-center"><?=$errors["vide"]??""?></p>
    <p class="text-danger text-center"><?=$errors["email"]??""?></p>
    </form>
       <?php endif; ?>
    <?php
       if (!isset($_SESSION["email"])) : ?>
           
           <select name="" id="">
          <?php foreach ($boutiques as $boutique) : ?>
            
            <option value="<?= $boutique["id_boutique"]?>">
            <?= $boutique["numero"]?> <?= $boutique["rue"]?> <?= $boutique["ville"]?>
          </option>
          <?php endforeach ?>
        </select>
    <button type="button" class="btn btn-danger btn-xl mb-3" data-bs-toggle="modal" data-bs-target="#connexionModal">
  <b> Retirer en magasin </b>
</button>
    <br>
  <div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Connectez vous pour continuer :</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-end">
      <a href="<?= url("/inscription")?>" class="btn btn-secondary ">Inscription</a>
        <a href="<?= url("/connexion")?>" class="btn btn-danger ">Connexion</a>
      </div>
      </div>
  </div>
</div>
       <?php endif; ?>
    
                </div>
            </div>
        </div>
   
</div>
<div class="modal fade" id="retirerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Vous aurez un delai de 7 jours pour le retirer et devrez venir muni d'une pièce d'identité :</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        
        <a href="<?= url("/retirer")?>" class="btn btn-dark ">Confirmer</a>
      </div>
      
    </div>
  </div>
</div>
