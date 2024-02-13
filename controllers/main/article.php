<?php

require "models/livre.php";
$title = "article";
$page = "article";

    $isbn = $_GET["isbn"] ;



$article = getLivre($_GET["isbn"],$db);

require "views/main/article.view.php";