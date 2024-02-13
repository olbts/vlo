<?php

require "models/livre.php";
$order = $_GET["order"] ?? "ASC";
$style = $_GET["style"]?? ["enfant","policier","fiction","documentaire","poche","scientifique",];
$prixmin = $_GET["prixmin"] ?? 0;
$prixmax = $_GET["prixmax"] ?? 100;

$livres = new Article();
$livres->setArticles(getFiltreLivres($order,$prixmin,$prixmax,$style,$db));

$page = "/";
$title = "Home";
require "views/main/index.view.php";