<?php 
require "models/livre.php";
require "models/livre_auteur.php";
if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$livres = getAllLivre($db);
require "views/admin/listeLivre.view.php";