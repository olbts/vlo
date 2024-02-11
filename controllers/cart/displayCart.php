<?php

$page = "/displayCart";
$title = "panier";
$panier =  new Article();

if (isset($_SESSION["email"])){
    
    $panier->setArticles($db->fetchAll('SELECT livre_panier.qte,livre.titre,livre.auteur , livre_panier.prix AS prix FROM `livre_panier`  , utilisateur,livre,panier WHERE  livre_panier.id_panier = panier.id_panier and utilisateur.email = :email AND livre.id_livre = livre_panier.id_livre AND utilisateur.id_utilisateur = panier.id_utilisateur and panier.actif = 1;',[
        ":email" => $_SESSION["email"],
    ]
    ));
    
    $prixtotal = $db->fetch('SELECT SUM(livre_panier.prix) AS prixtotal FROM `livre_panier` , panier,utilisateur,livre WHERE livre_panier.id_panier = panier.id_panier and utilisateur.email = :email AND livre.id_livre = livre_panier.id_livre AND utilisateur.id_utilisateur = panier.id_utilisateur and panier.actif = 1;',[
        ":email" => $_SESSION["email"],
    ]
    )["prixtotal"];
    ;
}
else{
   
    $panier->setArticles($_SESSION["panier"]);
  
    $prixtotal = $_SESSION["prix_panier"];
    
    
    
}




 
require "views/cart/displayCart.view.php";