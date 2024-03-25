<?php 

if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}

require "models/auteur.php";


if(!isset($_POST["nom"]) && !isset($_POST["prenom"])){
    require "views/admin/ajouterAuteur.view.php" ; 
    exit();
}

$currentNom = $_POST["nom"];
$currentPrenom = $_POST["prenom"];


if (! $verif::string($_POST['prenom'])) {
    $banner = "Prénom de l'auteur invalide ! ";
}
if (! $verif::string($_POST['nom'])) {
    $banner = "Nom de l'auteur invalide ! ";
}

if (empty($banner)) {
    insertAuteur($_POST["nom"],$_POST["prenom"],$db);
    echo "<script>window.location.replace('index.php?page=/listeAuteur&success=add')</script>";
        }

    

else{
require "views/admin/ajouterAuteur.view.php" ; 
}