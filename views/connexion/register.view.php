
    <div class="row bg-secondary bg-gradient border border-dark text-light"><h4> <?php 
        if (isset($_SESSION["email"])) {
            echo "Bienvenue ".$_SESSION["email"]."!";
        }
        else{
            echo "Vous n'etes pas connecté";
        }
        ?> </h4></div>
<div class="container">
  <div class="row mt-5">
    <div class="col-0 col-md-3"></div>
    <div class="col-12 col-md-6">
      <div class="container">
      <form class="row g-2" method="post"action="index.php?page=/inscription">
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Adresse Email : </label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value='<?= $currentEmail ??""?>'>
  </div>
  <div class="col-12"><?php if (isset($errors["email"])) {
                echo '<p class="text-danger">'.$errors["email"].'</p>';
                
              } ?></div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Mot de passe : </label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>
  <div class="col-6 ">
    <label for="inputPassword5" class="form-label">Confirmer Mot de passe : </label>
    <input type="password" class="form-control" id="inputPassword5" name="password2">
  </div>
  
  <div class="col-12">
  <?php 
  if (isset($errors["password"]) && !isset($errors["email"])) {
                echo '<p class="text-danger">'.$errors["password"].'</p>';
                
              } 
      else if (isset($errors["equalPassword"]) && !isset($errors["email"])) {
                echo '<p class="text-danger">'.$errors["equalPassword"].'</p>';
                } 
      else{
        echo '<p class="text-secondary">'.'8 caracteres minimum, dont une majuscule,une minuscule,un chiffre et un caractere special'.'</p>';
      }
      ?>
  </div>
  <div class="col-12 text-end ">
    <button type="submit" class="btn btn-danger ">Inscription</button>
  </div>
</form>
</div>
      </div>
    </div>
    <div class="col-0 col-md-3"></div>
  </div>
</div>
