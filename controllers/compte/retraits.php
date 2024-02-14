<?php 

$page = "/retraits"; 
$retraits = new Article();
$retraits->setArticles($db->fetchAll("SELECT retrait.id_retrait ,retrait.code,retrait.date_fin from panier,utilisateur,retrait where   panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND retrait.id_panier = panier.id_panier AND panier.actif = 0;"
,[
    ":email" =>  $_SESSION["email"],
    
]));
$currentDate = strtotime(date('Y-m-d')) ;
$date_fin = strtotime($retraits->getArticles()[0]["date_fin"]);

require "views/compte/retraits.view.php";