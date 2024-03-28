<?php 

if(!estGerant()){
    replace("/");
}
require "models/style.php";
require "models/livre.php";
require "models/auteur.php";
require "models/livre_auteur.php";
$styles = getAllStyle($db);
$auteurs = getAllAuteur($db);
if(!isset($_POST["isbn"])){
    require "views/admin/ajouterLivre.view.php" ; 
    exit();
}
$currentIsbn = $_POST["isbn"];
$currentTitre = $_POST["titre"];
$currentDate = $_POST["date_parution"];
$currentPage = intval($_POST["nb_page"]);
$currentPrix = intval($_POST["prix"]);
$currentDescription = $_POST["description"];
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
if (! $verif::img($_FILES['file']['name'],$_FILES['file']['error'])) {
    $banner = "Image invalide ! ";
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
if (! $verif::isbn($_POST['isbn'])) {
    $banner = "Isbn invalide ! ";
}
if (empty($banner)) {
    $isbn = formatIsbn($_POST["isbn"]);
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $error = $_FILES['file']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    move_uploaded_file($tmpName,"./public/img/livres/".$isbn.".".$extension);
    insertLivre($isbn,$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
    for ($i=0; $i < sizeof($_POST["auteur"]); $i++) { 
        insertLivre_auteur($isbn,$_POST["auteur"][$i],$db);
    }
    
    replace("/listeLivre&success=add");
        }
else{
require "views/admin/ajouterLivre.view.php" ; 
}