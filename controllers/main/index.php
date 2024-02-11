<?php
$order = $_GET["order"] ?? "ASC";
$style = $_GET["style"]?? ["enfant","policier","fiction","documentaire","poche","scientifique",];
$prixmin = $_GET["prixmin"] ?? 0;
$prixmax = $_GET["prixmax"] ?? 100;

$livres = new Article();
$livres->setArticles($db->fetchAll(filtre($order,$prixmin,$prixmax,$style)
));

$page = "/";
$title = "Home";
require "views/main/index.view.php";