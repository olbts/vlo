<?php 
require "models/style.php";
require "models/livre.php";
require "models/auteur.php";
require "models/livre_auteur.php";

if(!estGerant()){
    replace("/");
}
$styles = getAllStyle($db);
if(isset($_GET["isbn"])){
    $livre = getLivre($_GET["isbn"],$db);
    
    $nom_prenom_auteur = explode(" ", $livre["auteur"]);
    $nom_auteur = $nom_prenom_auteur[0];
    $prenom_auteur = $nom_prenom_auteur[1];
    require "views/admin/modifierLivre.view.php" ; 
}
else if (isset($_POST["isbn"])) {
    $auteur = getAuteur($_POST["nom_auteur"],$_POST["prenom_auteur"],$db);
    if(!empty($auteur)){
        updateLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        updateLivre_auteur($_POST["isbn"],$auteur["id_auteur"],$db);
    }
    else{
        $nom_auteur = $_POST["nom_auteur"]." ";
        insertAuteur($nom_auteur,$_POST["prenom_auteur"],$db);
        $id_auteur = $db->lastInsertId();
        updateLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        updateLivre_auteur($_POST["isbn"],$id_auteur,$db);
    }
    replace("/listeLivre&success=change");
}
else{
    dd("on a pas réussi à recuperer l'isbn");
}
