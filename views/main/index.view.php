   
    <div class="container-fluid ">
        <div class="row ">
        
        <?php if(isset($_GET["ajouter"])) :?>
        
        <h5 class="bg-success text-light text-opacity-5">Votre livre a bien été ajouté au panier</h5>
    <?php endif ?>
        </div>
        <div class="row">
        <div class="container-fluid col-0 col-md-2 mx-0 px-0 mt-2 kk ">
        <?php require "views/partials/side.php"?>
        
        </div>
        <div class="container-fluid col-12 col-md-10  books">
            <?php if ($livres->set()) : ?>
                
                <div class="row row-cols-1 row-cols-md-4 card-group mt-4 gy-3">
            
            <?php foreach ($livres->getArticles() as $key => $value) :    ?>
        <div class="col "> 
        <a href="<?= url("/article",[
                        "isbn" => $value["isbn"],
                    ])?>" class="bref">
            <div class="card   h-100">
            <div class="non ">
            <img src="<?= img("gaga")?>" class="card-img-top oki" alt="...">
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

            <?php if(!$livres->set()): ?>
                  <h3 class=" text-danger m-5 p-5">No result found</h3>
                  <?php endif; ?>
    </div>
    
    </div>
    </div>
    <script>
//     const titre = document.querySelectorAll(".rawe");
 
//  titre.forEach(e=>{
 
//   e.innerHTML = e.innerHTML.slice(0,15) 
  
//  })
</script>
<style>
    .non{
       
        width :100%;
        height : 220px;
        display : flex; 
        align-items: center;
      
        justify-content : center;
        overflow: hidden;
        padding : 0;
        
    }
    
    
    .oki{
        padding:0;
        margin : 0;
       
        width: fit-content;
        height : 100%;
        height : fit-content;
        
    }
</style>
    <script src="js/index.js"></script>
   
    
    
