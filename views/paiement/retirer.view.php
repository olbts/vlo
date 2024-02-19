
    <div class="container-fluid text-center mt-5">
        <div class="row ">
            <div class="col-0 col-md-3 ">

            </div>
            <div class="col-12 col-md-6 "> 
                    
                <div class="border border-dark bg-dark border-3 bg-opacity-10 border rounded-4">
                    <h2 class="text-danger mt-2">Librairie Vivlio</h2>
                    <h3> Adresse : <?= $boutique["numero"]?> <?= $boutique["rue"]?> <?= $boutique["ville"]?></h3>
                    <h3>télephone : <?= $boutique["telephone"]?></h3>
                    <p>code à donner lors du retrait de la commande : <span ><h1 class="text-info"><?=$code?></h1></span></p>
                    <div class="text-center justify-content-center  row mx-2">Moyens de paiement acceptés : <span > <ul>
                        <li>Carte Bleue</li>
                        <li>Chèque</li>
                        <li>Espèces</li>
                    </ul></span></div>
                </div>
            </div>
            <div class="col-0 col-md-3">
                <p class="mt-2"><a href="index.php">Continuer mes achats</a></p>
            </div>
            
           

        </div>
    </div>
   
   