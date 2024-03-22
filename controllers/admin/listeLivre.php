<?php 
require "models/livre.php";
require "models/livre_auteur.php";
$success = [
    "change" => "Le livre a bien été modifié" ,
    "delete" => "Le livre a bien été supprimé",
    "add"    => "Le livre a bien été ajouté"  ,
];
if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$livres = getAllLivre($db);
require "views/admin/listeLivre.view.php";