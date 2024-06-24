<?php

require "models/client.php";
require "models/commentaire.php";
if(!estConnecte()){
    replace("/");
}
$info = ["text-secondary" , "8 caracteres minimum, dont une majuscule,une minuscule,un chiffre et un caractere special"];
if (isset($_POST["updatePassword"])) {
    if (! $verif::password($_POST['newPassword'])) {
        $info = ['text-danger' ,'8 caracteres minimum, dont une majuscule,une minuscule,un chiffre et un caractere special'];
    }
    else{
        
        $client = getClient($_SESSION["email"],$db);
        
        if (password_verify($_POST["oldPassword"],$client["password"])) {
            $email = $_SESSION["email"];
            $crypted = password_hash($_POST["newPassword"],PASSWORD_DEFAULT);
            updateClient(($_SESSION["email"]),$crypted,$db);
            $info = ["text-success" , "Mot de passe modifié !"];
        }
        else{
            $info = ["text-danger" , "Mot de passe incorrect"];
        }
    }
}
elseif (isset($_POST["infos"])) {
   
    updateClientInfos($_SESSION["email"],$_POST["nom"],$_POST["prenom"],$_POST["dob"],$_POST["adresse"],$db);
    $info = ["text-success" , "Infomartions personnelles modifiées !"];
    $time = strtotime($_POST["dob"]);
    //dd(date('m-d') == date('m-d', $time));
    if(date('m-d') == date('m-d', $time)) {
            
        $_SESSION["anniversaire"] = true;
    }
    else{
        $_SESSION["anniversaire"] = false;
    }
}
$infos =getClient($_SESSION["email"],$db);
$commentaires = new Article();
$commentaires->setArticles(getCommentairesEmail($_SESSION["email"],$db));
require "views/compte/compte.view.php";