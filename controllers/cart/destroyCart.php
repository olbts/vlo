<?php

$page = "/destroyCart";
$title = "panier";

require "models/panier.php";
require "models/livre.php";
if (estConnecte()) {
    deletePanier($_POST["isbn"],$_SESSION["email"],$db);
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
    
    
}
else{
   //on verra après pour supprimer du panier session
   foreach ($_SESSION["panier"] as $key=>$panier) {
    if ($panier["titre"]===$_POST["titre"]) {
        $_SESSION["prix_panier"] = $_SESSION["prix_panier"] - $_SESSION["panier"][$key]["prix"];
       unset($_SESSION["panier"][$key]);
    }
   }
   $_SESSION["nb_panier"] = sizeof($_SESSION["panier"]);
    
}

 //faudra avec un try & catch
$ajouter = true;
$lien = "/storeCart";
$titre = $_POST["isbn"];
//require "controllers/article.php";
// echo "<script defer>window.location.replace('index.php?page=/article&ajouter=true&titre=".$titre."')</script>";
echo "<script defer>window.location.replace('index.php?page=/displayCart')</script>";









