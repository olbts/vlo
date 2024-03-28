<?php

if(!estConnecte()){
    replace("/");
}
if(empty($_GET["code"])){
    replace("/achats");
}
require "models/retrait.php"; 
$page = "/achat";
$achat = getRetrait($_GET["code"],$db);
if(empty($achat["code"])){
    replace("/achats");
}
require "views/compte/achat.view.php";