<?php 
require "models/livre.php";
require "models/livre_auteur.php";
require "models/retrait.php";
require "models/retrait_livre.php";
require "models/panier.php";
if(!estGerant()){
    replace("/");
}
if(isset($_POST["isbn"])){
    deletePanierIsbn($_POST["isbn"],$db);
    deleteRetraitLivre($_POST["isbn"],$db);
    deleteLivre_auteur($_POST["isbn"],$db);
    deleteLivre($_POST["isbn"],$db);
    $path = "./public/img/livres/".$_POST["isbn"].".png";
    if( file_exists ( $path))
     unlink( $path ) ;
     replace("/listeLivre&success=delete");
}
else{
    replace("/admin");
}