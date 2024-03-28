<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-3 col-0"></div>
        <div class="col-0 col-md-6">
          <div class="mb-3">
              <form action="index.php?page=/connexion" method="post">
                <label for="inputEmail" class="form-label">Adresse Email : </label>
                <input type="email" class="form-control" id="inputEmail" name="email" value='<?= $currentEmail ??""?>'>
                <?php 
                if (isset($errors["email"])) {
                  echo '<p class="text-danger">'.$errors["email"].'</p>';
                }?>
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
              }?>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary me-md-2" href="<?=url("/inscription")?>" type="button">S'inscrire</a>
            <button class="btn btn-danger" type="submit">Connexion</button>
          </div>
              </form> </div>
        </div>
      <div class="col-md-3 col-0"></div>
  </div>
</div>
