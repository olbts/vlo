<?php

$page = "/achat";
$achat = new Article();

$achat->setArticles($db->fetchAll('SELECT livre_panier.qte,livre.titre , livre_panier.prix AS prix FROM `livre_panier`  ,livre,panier,commande WHERE  livre_panier.id_panier = panier.id_panier  AND livre.id_livre = livre_panier.id_livre AND commande.id_commande = :id_achat AND commande.id_panier = panier.id_panier;',[
    ":id_achat" => $_GET["id_achat"],
]
));
require "views/compte/achat.view.php";