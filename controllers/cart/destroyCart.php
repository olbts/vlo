<?php

$page = "/destroyCart";
$title = "panier";



if (isset($_SESSION["email"])) {
    $id_livre_panier =  $db->fetch("SELECT livre_panier.id_livre_panier from panier,utilisateur,livre_panier,livre where panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email = :email AND livre_panier.id_panier = panier.id_panier AND livre_panier.id_livre = livre.id_livre AND livre.titre = :titre;"
    ,[
        ":titre" => $_POST["titre"],
        ":email" =>  $_SESSION["email"],
        
    ])["id_livre_panier"];
    
    
    $db->query("DELETE FROM `livre_panier` WHERE id_livre_panier = :id_livre_panier",
    [
        ":id_livre_panier" => $id_livre_panier,
    ]);

    
    
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
$titre = $_POST["titre"];
//require "controllers/article.php";
// echo "<script defer>window.location.replace('index.php?page=/article&ajouter=true&titre=".$titre."')</script>";
echo "<script defer>window.location.replace('index.php?page=/displayCart')</script>";









