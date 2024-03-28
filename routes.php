<?php

$routes = [
    "/"                =>    "controllers/main/index.php" , 
    "/article"         =>    "controllers/main/article.php",
    "/resultat"        =>    "controllers/main/resultat.php",
    "/connexion"       =>    "controllers/connexion/loginUser.php",
    "/inscription"     =>    "controllers/connexion/storeUser.php",
    "/resetPassword"   =>    "controllers/connexion/resetPassword.php",
    "/mailReset"       =>    "controllers/connexion/mailReset.php",
    "/logOut"          =>    "controllers/connexion/logOut.php",
    "/displayCart"     =>    "controllers/cart/displayCart.php",
    "/storeCart"       =>    "controllers/cart/storeCart.php",
    "/destroyCart"     =>    "controllers/cart/destroyCart.php",
    "/updateCart"      =>    "controllers/cart/updateCart.php",
    "/compte"          =>    "controllers/compte/index.php",
    "/achat"           =>    "controllers/compte/achat.php",
    "/achats"          =>    "controllers/compte/achats.php",
    "/supprimerCompte" =>    "controllers/compte/supprimerCompte.php",
    "/retirer"         =>    "controllers/paiement/retirer.php",
    "/admin"           =>    "controllers/admin/admin.php",
];

$adminRoutes = [
    "/"                =>    "controllers/admin/admin.php",
    "/admin"           =>    "controllers/admin/admin.php",
    "/ajouterLivre"    =>    "controllers/admin/ajouterLivre.php",
    "/modifierLivre"   =>    "controllers/admin/modifierLivre.php",
    "/supprimerLivre"  =>    "controllers/admin/supprimerLivre.php",
    "/ajouterAuteur"   =>    "controllers/admin/ajouterAuteur.php",
    "/supprimerAuteur" =>    "controllers/admin/supprimerAuteur.php",
    "/listeLivre"      =>    "controllers/admin/listeLivre.php",
    "/listeRetrait"    =>    "controllers/admin/listeRetrait.php",
    "/listeAuteur"     =>    "controllers/admin/listeAuteur.php",
];