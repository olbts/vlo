<?php 

require "models/retrait.php";
require "models/retrait_livre.php";
require "models/panier.php";
require "models/boutique.php";
$errors = [];
if(!estConnecte()){
    $errors["email"] = "vous devez être connecté";
    require "controllers/cart/displayCart.php";
    die();
}
if(taillePanier($_SESSION["email"],$db) == 0){
    replace("/displayCart");
    }
$code = insertRetrait($_POST["boutique"],$_SESSION["email"],$db);
insertRetraitLivre($code,$_SESSION["email"],$db);
deleteAllPanier($_SESSION["email"],$db);
$_SESSION["nb_panier"] = 0;
$boutique = getBoutique($_POST["boutique"],$db);
require "views/paiement/retirer.view.php";