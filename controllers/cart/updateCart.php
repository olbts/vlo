<?php 

require "models/panier.php";
if(empty($_POST["isbn"])){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
if(estConnecte()){
    updatePanier($_POST["qte"],$_SESSION["email"],$_POST["isbn"],$db);
}
else{
    foreach ($_SESSION["panier"] as $key=>$panier) {
        if ($panier["isbn"]===$_POST["isbn"]) {
            $_SESSION["panier"][$key]["qte"] =$_POST["qte"] ;
            }
        }
    }
    echo "<script defer>window.location.replace('index.php?page=/displayCart')</script>";

 