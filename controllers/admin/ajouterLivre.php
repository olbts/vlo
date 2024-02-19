<?php 
require "models/style.php";
require "models/livre.php";
require "models/auteur.php";
require "models/livre_auteur.php";
if(!estGerant()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
    exit(); 
}
$styles = getAllStyle($db);
if (isset($_POST["isbn"])) {
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $error = $_FILES['file']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if(in_array($extension, $extensions) && $error == 0){
        move_uploaded_file($tmpName,"./public/img/livres/".$_POST["isbn"].".".$extension);
        }
    else{
        echo "prob fichier image";
        require "views/admin/ajouterLivre.view.php" ;
    }
    $auteur = getAuteur($_POST["nom_auteur"],$_POST["prenom_auteur"],$db);
    if(!empty($auteur)){
        insertLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        insertLivre_auteur($_POST["isbn"],$auteur["id_auteur"],$db);
    }
    else{
        $nom_auteur = $_POST["nom_auteur"]." ";
        insertAuteur($nom_auteur,$_POST["prenom_auteur"],$db);
        $id_auteur = $db->lastInsertId();
        insertLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
        insertLivre_auteur($_POST["isbn"],$id_auteur,$db);
    }
    echo "<script>window.location.replace('index.php?page=/listeLivre&success=meh')</script>";
}
else{
require "views/admin/ajouterLivre.view.php" ; 
}