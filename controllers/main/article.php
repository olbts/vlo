<?php

if(empty($_GET["isbn"])){
    replace("/");
}
require "models/commentaire.php";
require "models/livre.php";
if(isset($_POST["isbn"])){
    if (!$verif::titre($_POST["titre"])) {
        $banner = "Titre invalide ! ";
    }if (!$verif::description($_POST["message"])) {
        $banner = "Description invalide ! ";
    }
    if (!$verif::note($_POST["note"])) {
        $banner = "Note invalide ! ";
    }
    if (!estConnecte()) {
        $banner = "Vous devez être connecté pour poster un commentaire ! ";
    }
    if (empty($banner)) {
        if(empty(getCommentaire($_POST["isbn"],$_SESSION["email"],$db))){
            insertCommentaire($_POST["isbn"],$_SESSION["email"],$_POST["titre"],$_POST["message"],$_POST["note"],$db);
        }else{
            updateCommentaire($_POST["isbn"],$_SESSION["email"],$_POST["titre"],$_POST["message"],$_POST["note"],$db);
        }    
    }
    else{
        $currentTitre = $_POST["titre"];
        $currentMessage = $_POST["message"];
    }
}
$isbn = $_GET["isbn"] ;
$article = getLivre($_GET["isbn"],$db);
if(empty($article["isbn"])){
    replace("/");
}
$others = new Article();
$others->setArticles(getLivreStyle($article["style"],$_GET["isbn"],$db));
$commentaires = getCommentaires($_GET["isbn"],$db);
@$avgNote = round(getAvg($_GET["isbn"],$db),1) ?? 0;
require "views/main/article.view.php";