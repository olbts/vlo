<?php 
require "models/retrait.php";
if(!estAdmin()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$retraits = getAllRetraitAdmin(ajd(),$db);
require "views/admin/listeRetrait.view.php";