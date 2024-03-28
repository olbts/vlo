<?php 
require "models/auteur.php";
require "models/livre_auteur.php";


if(!estGerant()){
    replace("/");
}
if(isset($_POST["deleteAuteur"])){
    if(!empty(getLivre_Auteur($_POST["deleteAuteur"],$db))){
        replace("/listeAuteur&success=prob");
    }
    deleteLivre_auteurId($_POST["deleteAuteur"],$db);
    deleteAuteur($_POST["deleteAuteur"],$db);
    replace("/listeAuteur&success=delete");
}
else{
    replace("/admin");
}
