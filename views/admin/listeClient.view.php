<div class="bg bg-body-tertiary  text-center">
    <h1 class="text-danger">Liste des Clients</h1>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <?php require "views/partials/sideAdmin.php"?>
    </div>
    <div class="col-12 col-md-9">
        <!-- <?php  if(isset($_GET["success"])) : ?>
        <h4 class="text-center bg bg-success text-white"><?= $success[$_GET["success"]] ?></h4>
        <?php endif ?> -->
        
            
            <?php foreach ($clients as $client) : ?>
                <?php if (isset($client["nom"])&&isset($client["prenom"])&&isset($client["dob"])) : ?>
                <a href="index.php?page=/detailClient&email=<?=$client["email"]?>" >
                <span><?=$client["nom"]  ?></span>
                    <span><?=$client["prenom"]  ?></span>
                    <span><?=$client["dob"]  ?></span>
                </a>
                <br>
                <?php endif ?>
            <?php endforeach ?>
           
        </div>
</div>