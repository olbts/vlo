<?php

$routes = [
    "/" => "controllers/main/index.php" , 
    "/article" => "controllers/main/article.php",
    "/resultat" => "controllers/main/resultat.php",
    "/connexion" => "controllers/connexion/index.php",
    "/register" => "controllers/connexion/register.php",
    "/loginUser" => "controllers/connexion/loginUser.php",
    "/storeUser" => "controllers/connexion/storeUser.php",
    "/resetPassword" => "controllers/connexion/resetPassword.php",
    "/mailReset" => "controllers/connexion/mailReset.php",
    "/logOut" => "controllers/connexion/logOut.php",
    "/displayCart" => "controllers/cart/displayCart.php",
    "/storeCart" => "controllers/cart/storeCart.php",
    "/destroyCart" => "controllers/cart/destroyCart.php",
    "/compte" => "controllers/compte/index.php",
    "/achat" => "controllers/compte/achat.php",
    "/achats" => "controllers/compte/achats.php",
    "/retraits" => "controllers/compte/retraits.php",
    "/supprimerCompte" => "controllers/compte/supprimerCompte.php",
    "/paiement" => "controllers/paiement/paiement.php",
    "/retirer" => "controllers/paiement/retirer.php",
   
];