<?php 
require "models/auteur.php";
$success = [
    
    "delete" => "L'auteur a bien été supprimé",
    "add"    => "L'auteur a bien été ajouté"  ,
];
if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$auteurs = getAllAuteur($db);

require "views/admin/listeAuteur.view.php";