<?php

$page = "/displayCart";
$title = "panier";
$panier =  new Article();
require "models/panier.php";
require "models/livre.php";
if (estConnecte()){
    $panier->setArticles(getAllPanier($_SESSION["email"],$db));
    $prixtotal = getPrixPanier($_SESSION["email"],$db);
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
}
else{
    $in = implode(",", $_SESSION['panier']);
    
    $panier->setArticles($_SESSION["panier"]);
  
    $prixtotal = $_SESSION["prix_panier"];
    
    
    
}




 
require "views/cart/displayCart.view.php";