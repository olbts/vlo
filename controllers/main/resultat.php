<?php

require "models/livre.php";
$order = $_GET["order"] ?? "ASC";
$style = $_GET["style"]?? ["enfant","policier","fiction","documentaire","poche","scientifique",];
$prixmin = $_GET["prixmin"] ?? 0;
$prixmax = $_GET["prixmax"] ?? 100;
$resultat = new Article();
$recherche = $_GET["barre"];
if (isset($recherche)) {
    $resultat->setArticles(rechercheLivres($recherche,$db));
}
require "views/main/resultat.view.php";
