
    <h1> <?php 
        if (isset($_SESSION["email"])) {
            echo "Bienvenue ".$_SESSION["email"]."!";
        }
        else{
            echo "Vous n'etes pas connecté";
        }
        ?> </h1>
        <hr>
        <h1>
            ceci est : <?= $title ?>

        </h1>
<div class="text-center mt-4">
<h3>Votre paiement a bien été validé</h3>
        <p class="mt-2"><a href="index.php">Continuer mes achats</a></p>
</div>
        
