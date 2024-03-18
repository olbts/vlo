<?php

if(!estConnecte()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
if(empty($_GET["code"])){
    echo "<script>window.location.replace('index.php?page=/achats')</script>";
            exit();
}
require "models/retrait.php"; 
$page = "/achat";
$achat = getRetrait($_GET["code"],$db);
if(empty($achat["code"])){
    echo "<script>window.location.replace('index.php?page=/achats')</script>";
            exit();
}
require "views/compte/achat.view.php";