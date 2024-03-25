<?php 
require "models/auteur.php";
require "models/livre_auteur.php";

if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}

if(isset($_POST["deleteAuteur"])){
    deleteLivre_auteurId($_POST["deleteAuteur"],$db);
    deleteAuteur($_POST["deleteAuteur"],$db);
    echo "<script>window.location.replace('index.php?page=/listeAuteur&success=delete')</script>"; 
}
else{
    dd("on finit là ? ");
    echo "<script>window.location.replace('index.php?page=/admin')</script>";
    die();
}
