<?php 
require "models/livre.php";
require "models/livre_auteur.php";
require "models/retrait.php";
require "models/livre_auteur.php";
if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}

if(isset($_POST["isbn"])){
    deletePanierIsbn($_POST["isbn"],$db);
    deleteRetraitLivre($_POST["isbn"],$db);
    deleteLivre_auteur($_POST["isbn"],$db);
    deleteLivre($_POST["isbn"],$db);
    echo "<script>window.location.replace('index.php?page=/listeLivre&success=meh')</script>"; 
}