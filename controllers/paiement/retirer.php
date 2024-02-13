<?php 

require "models/retrait.php";
require "models/retrait_livre.php";
require "models/panier.php";
$page = "/retirer";
$title = "retirer";
$errors = [];
if(!isset($_SESSION["email"])){
    $errors["email"] = "vous devez être connecté";
        require "controllers/cart/displayCart.php";
        die();
}

$code = insertRetrait($_SESSION["email"],$db);
insertRetraitLivre($code,$_SESSION["email"],$db);
deleteAllPanier($_SESSION["email"],$db);

require "views/paiement/retirer.view.php";