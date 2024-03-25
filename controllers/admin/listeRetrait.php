<?php 
require "models/retrait.php";
if(!estAdmin()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$retraits = getAllRetraitAdmin(ajd(),$db);
// dd($retraits);
require "views/admin/listeRetrait.view.php";