<?php

if(!estConnecte()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
require "models/retrait.php";
$commandes = new Article();
$commandes->setArticles(getAllRetrait($_SESSION["email"],$db));


require "views/compte/achats.view.php";