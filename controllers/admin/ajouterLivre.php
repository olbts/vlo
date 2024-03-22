<?php 

if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
require "models/style.php";
require "models/livre.php";
require "models/auteur.php";
require "models/livre_auteur.php";
$styles = getAllStyle($db);
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
$currentNom = $_POST["nom_auteur"];
$currentPrenom = $_POST["prenom_auteur"];
$styles = getAllStyle($db);
foreach ($styles as  $style){
    $listeStyles[] = $style["style"];
}
if(in_array($_POST["style"],$listeStyles) == false){
    $banner = "Style invalide ! ";
}
if (! $verif::img($_FILES['file']['name'],$_FILES['file']['error'])) {
    $banner = "Image invalide ! ";
}
if (! $verif::string($_POST['prenom_auteur'])) {
    $banner = "Prénom de l'auteur invalide ! ";
}
if (! $verif::string($_POST['nom_auteur'])) {
    $banner = "Nom de l'auteur invalide ! ";
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
    $auteur = getAuteur($_POST["nom_auteur"],$_POST["prenom_auteur"],$db);
    if(!empty($auteur)){
        insertLivre($isbn,$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        insertLivre_auteur($isbn,$auteur["id_auteur"],$db);
    }
    else{
        $nom_auteur = $_POST["nom_auteur"]." ";
        insertAuteur($nom_auteur,$_POST["prenom_auteur"],$db);
        $id_auteur = $db->lastInsertId();
        insertLivre($isbn,$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        insertLivre_auteur($isbn,$id_auteur,$db);
    }
    echo "<script>window.location.replace('index.php?page=/listeLivre&success=add')</script>";
        }

    

else{
require "views/admin/ajouterLivre.view.php" ; 
}