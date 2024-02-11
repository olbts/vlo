<?php
$page = "/resultat";
$title = "resultat";
$order = $_GET["order"] ?? "ASC";
$style = $_GET["style"]?? ["enfant","policier","fiction","documentaire","poche","scientifique",];
$prixmin = $_GET["prixmin"] ?? 0;
$prixmax = $_GET["prixmax"] ?? 100;
$resultat = new Article();
$recherche = $_GET["barre"];
if (isset($recherche)) {
    $resultat->setArticles($db->fetchAll("SELECT * from livre where titre LIKE '%$recherche%' or description LIKE '%$recherche%' or auteur LIKE '%$recherche%'or  style LIKE '%$recherche%'  ",
));
}

require "views/main/resultat.view.php";
