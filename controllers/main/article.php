<?php

$title = "article";
$page = "article";

    $titre = $_GET["titre"] ;



$article = $db->fetch("Select * from livre where titre = :titre "
,[
    ":titre"=> $titre,
    
]);

require "views/main/article.view.php";