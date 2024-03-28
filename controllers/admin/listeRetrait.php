<?php 
require "models/retrait.php";
if(!estAdmin()){
    replace("/");
}
$retraits = getAllRetraitAdmin(ajd(),$db);
require "views/admin/listeRetrait.view.php";