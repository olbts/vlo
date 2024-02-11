
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
                <div class="col- text-center">
          <h1>Chantier en cours</h1>
                </div>
            </div>
        </div>
   
