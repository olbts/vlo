<?php

$title = "panier";
require "models/panier.php";
require "models/livre.php";
if(empty($_POST["isbn"])){
    replace("/");
}
if (estConnecte()) {
    deletePanier($_POST["isbn"],$_SESSION["email"],$db);
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
    }
else{
   foreach ($_SESSION["panier"] as $key=>$panier) {
    if ($panier["isbn"]===$_POST["isbn"]) {
        $_SESSION["prix_panier"] = $_SESSION["prix_panier"] - $_SESSION["panier"][$key]["prix"];
       unset($_SESSION["panier"][$key]);
    }
   }
   $_SESSION["nb_panier"] = sizeof($_SESSION["panier"]);
}
$ajouter = true;
$titre = $_POST["isbn"];
replace("/displayCart");









