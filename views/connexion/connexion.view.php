
    <div class="row bg-secondary bg-gradient border border-dark text-light"><h4> <?php 
        if (isset($_SESSION["email"])) {
            echo "Bienvenue ".$_SESSION["email"]."!";
        }
        else{
            echo "Vous n'etes pas connecté";
        }
        ?> </h4></div>
   
   <div class="container-fluid">
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
        <div class="mb-3">
    <form action="index.php?page=/loginUser" method="post">
              <label for="inputEmail" class="form-label">Adresse Email : </label>
              <input type="email" class="form-control" id="inputEmail" name="email" value='<?= $currentEmail ??""?>'>
              <?php 
              if (isset($errors["email"])) {
                echo '<p class="text-danger">'.$errors["email"].'</p>';
                
              }
              
                
              
              ?>
              
              </div>
              <div class="mb-3">
              <label for="inputPassword" class="form-label">Mot de passe : </label>
              <input type="password" class="form-control" id="inputPassword" name="password">
              <?php 
              if (isset($errors["password"])) {
                echo '<p class="text-danger">'.$errors["password"].'</p>';
              }
              else if (isset($errors["equalPassword"])) {
                echo '<p class="text-danger">'.$errors["equalPassword"].'</p>';
                
              }
              
                
              
              ?>
              
                
              
              
              </div>
              <div class="mb-3">
                
                
                
                  <a href="<?=url("/resetPassword")?>"> Mot de passe oublié</a>
               
                
              </div> 
              
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-secondary me-md-2" href="<?=url("/register")?>" type="button">S'inscrire</a>
      <button class="btn btn-danger" type="submit">Connexion</button>
      </div>
              </form> </div>
        </div>
        <div class="col-3"></div>
    </div>
   </div>
