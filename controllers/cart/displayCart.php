<?php

$page = "/displayCart";
$title = "panier";
require "models/panier.php";
require "models/livre.php";
require "models/boutique.php";
$panier =  new Article();
if (estConnecte()){
    $panier->setArticles(getAllPanier($_SESSION["email"],$db));
    $prixtotal = getPrixPanier($_SESSION["email"],$db);
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
}
else{
    $allPanier = array();
    $prixtotal = 0;
    foreach ($_SESSION['panier'] as $key => $session_panier) {
        $prixtotal = $prixtotal + ($session_panier["qte"] * $session_panier["prix"]);
        $little_panier = getLivre($session_panier["isbn"],$db);
        $little_panier["qte"] = $session_panier["qte"];
        $little_panier["prixtotal"] = $session_panier["qte"] * $little_panier["prix"];
        $allPanier[] = $little_panier;
    }
    $panier->setArticles($allPanier);
}
$boutiques = getAllBoutique($db);
require "views/cart/displayCart.view.php";