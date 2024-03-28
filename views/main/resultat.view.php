
<style>
    a{
        text-decoration :none !important;
    }
</style>
    
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-md-2 col-12 ">
            <?php require "views/partials/side.php"?>
            </div>
            <div class="col-12 col-md-10 mt-5">
            <?php if($resultat->set()): ?>
                <?php foreach ($resultat->getArticles() as $key => $value) : ?>
                    <a href="<?= url("/article",[
                        "isbn" => $value["isbn"],
                    ])?>" >
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
  
    <div class="col-md-4">
      <img src="<?= img($value["isbn"])?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $value["titre"]?></h5>
        <p class="card-text"><small class="text-body-secondary"><?= $value["prix"]?>$</small></p>
      </div>
    </div>
  
  </div>
</div>
</a>
                <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if(!$resultat->set()): ?>
                  <h3 class=" text-danger m-5 p-5">Aucun résultat</h3>
                  <?php endif; ?>
            </div>
        </div>
    </div>

    









