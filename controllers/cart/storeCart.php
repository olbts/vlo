<?php

require "models/panier.php";
require "models/livre.php";

if (estConnecte()) {
    $panier = getPanier($_SESSION["email"],$_POST["isbn"],$db);
    if(!empty($panier)){
        updateQtePanier($_POST["qte"],$_SESSION["email"],$_POST["isbn"],$db);
    }
    else{
        insertPanier($_SESSION["email"],$_POST["isbn"],$_POST["qte"],$db);
    }
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
    }
else{
    $prix_total = $_POST["qte"] * $_POST["prix"];
    $in = false;
    foreach ($_SESSION["panier"] as $key=>$panier) {
            if ($panier["isbn"]===$_POST["isbn"]) {
                $_SESSION["panier"][$key]["qte"] =$_SESSION["panier"][$key]["qte"] + $_POST["qte"] ;
                $in = true;
            }
        }
    if(!$in){
            $_SESSION["panier"][] = [
                "isbn" => $_POST["isbn"],
                "qte" => $_POST["qte"],
                ];
            }
    $_SESSION["prix_panier"] = $_SESSION["prix_panier"] + $prix_total;
    $_SESSION["nb_panier"] = sizeof($_SESSION["panier"]);
}
updatePopulaireLivre($_POST["qte"],$_POST["isbn"],$db);
echo "<script defer>window.location.replace('index.php?page=/&ajouter=true')</script>";