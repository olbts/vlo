<?php

if(!estConnecte()){
    replace("/");
}
require "models/retrait.php";
$commandes = new Article();
$commandes->setArticles(getAllRetrait($_SESSION["email"],$db));
require "views/compte/achats.view.php";