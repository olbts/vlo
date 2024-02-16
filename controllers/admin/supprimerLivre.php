<?php 
require "models/livre.php";
require "models/livre_auteur.php";

if(isset($_POST["isbn"])){
    deleteLivre_auteur($_POST["isbn"],$db);
    deleteLivre($_POST["isbn"],$db);
    echo "<script>window.location.replace('index.php?page=/listeLivre&success=meh')</script>"; 
}