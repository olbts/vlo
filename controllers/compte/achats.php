<?php

$commandes = new Article();
$commandes->setArticles($db->fetchAll("SELECT commande.id_commande from panier,utilisateur,commande where   panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND commande.id_panier = panier.id_panier ;"
,[
    
    ":email" =>  $_SESSION["email"],
    
]));


require "views/compte/achats.view.php";