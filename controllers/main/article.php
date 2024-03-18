<?php

if(empty($_GET["isbn"])){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
require "models/livre.php";
$title = "article";
$page = "article";
$isbn = $_GET["isbn"] ;
$article = getLivre($_GET["isbn"],$db);
if(empty($article["isbn"])){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}

require "views/main/article.view.php";