<?php

require "models/livre.php";
$min = 0;
$max = maxPrix($db) + 1;
$order = $_GET["order"] ?? "ASC";
$style = $_GET["style"]?? ["enfant","policier","fiction","documentaire","poche","scientifique",];
$prixmin = $_GET["prixmin"] ?? $min;
$prixmax = $_GET["prixmax"] ?? $max;
$livres = new Article();
$livres->setArticles(getFiltreLivres($order,$prixmin,$prixmax,$style,$db));
$page = "/";
$title = "Home";
require "views/main/index.view.php";