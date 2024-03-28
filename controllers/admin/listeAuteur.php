<?php 
require "models/auteur.php";
$success = [
    
    "delete" => "L'auteur a bien été supprimé",
    "add"    => "L'auteur a bien été ajouté"  ,
    "prob"       => "Des livres utilisent cet auteur"
];
if(!estGerant()){
    replace("/");
}
$auteurs = getAllAuteur($db);

require "views/admin/listeAuteur.view.php";