<?php 
require "models/style.php";
require "models/livre.php";
require "models/auteur.php";
require "models/livre_auteur.php";

if(!estGerant()){
    replace("/");
}
//dd($_POST);
$styles = getAllStyle($db);
$auteurs = getAllAuteur($db);
if(isset($_GET["isbn"])){
    $livre = getLivre($_GET["isbn"],$db);
    $currentFichier = "./public/img/livres/".$_GET["isbn"].".png";
    
   /* $nom_prenom_auteur = explode(" ", $livre["auteur"]);
    $nom_auteur = $nom_prenom_auteur[0];
    $prenom_auteur = $nom_prenom_auteur[1];*/
    require "views/admin/modifierLivre.view.php" ; 
}
else if (isset($_POST["isbn"])) {

$currentIsbn = $_POST["isbn"];
/*$currentTitre = $_POST["titre"];
$currentDate = $_POST["date_parution"];
$currentPage = intval($_POST["nb_page"]);
$currentPrix = intval($_POST["prix"]);
$currentDescription = $_POST["description"];*/

foreach ($styles as  $style){
    $listeStyles[] = $style["style"];
}
foreach ($auteurs as  $auteur){
    
    $listeAuteurs[] = $auteur["id_auteur"];
    
}
if(in_array($_POST["style"],$listeStyles) == false){
    $banner = "Style invalide ! ";
}
for ($i=0; $i < sizeof($_POST["auteur"]); $i++) { 
    if(in_array($_POST["auteur"][$i],$listeAuteurs) == false){
        $banner = "Auteur invalide ! ";
    }
}
if(sizeof(array_unique($_POST["auteur"])) != sizeof($_POST["auteur"])){
    $banner = "Plusieurs fois le même auteur ! ";
}


if (! $verif::description($_POST['description'])) {
    $banner = "Description invalide ! ";
}
if (! $verif::prix($_POST['prix'])) {
    $banner = "Prix invalide ! ";
}
if (! $verif::page($_POST['nb_page'])) {
    $banner = "Nombre de pages  invalide ! ";
}
if (! $verif::date($_POST['date_parution'])) {
    $banner = "Date de parution invalide ! ";
}
if (! $verif::titre($_POST['titre'])) {
    $banner = "Titre invalide ! ";
}
if(empty($banner)){
    if ($verif::img($_FILES['file']['name'],$_FILES['file']['error'])) {
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $error = $_FILES['file']['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        move_uploaded_file($tmpName,"./public/img/livres/".$currentIsbn.".".$extension);
    }
    updateLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
    deleteLivre_auteur($currentIsbn,$db);
    for ($i=0; $i < sizeof($_POST["auteur"]); $i++) { 
        insertLivre_auteur($currentIsbn,$_POST["auteur"][$i],$db);
    }
    replace("/listeLivre&success=change");
}else{
    $livre = getLivre($_POST["isbn"],$db);
    $currentFichier = "./public/img/livres/".$currentIsbn.".png";
    require "views/admin/modifierLivre.view.php" ;
}
    /*$auteur = getAuteur($_POST["nom_auteur"],$_POST["prenom_auteur"],$db);
    if(!empty($auteur)){
        updateLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        updateLivre_auteur($_POST["isbn"],$auteur["id_auteur"],$db);
    }
    else{
        $nom_auteur = $_POST["nom_auteur"]." ";
        insertAuteur($nom_auteur,$_POST["prenom_auteur"],$db);
        $id_auteur = $db->lastInsertId();
        updateLivre_auteur($_POST["isbn"],$id_auteur,$db);
    }
    */
}
else{
    replace("/");
}
