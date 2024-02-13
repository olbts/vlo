<?php

require "models/panier.php";
require "models/livre.php";

if (estConnecte()) {
    //on recupere de la session l email et du form l isbn

    // $infos =  $db->fetch("SELECT panier.id_panier,livre.id_livre from livre,panier,utilisateur where livre.titre = :titre AND panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND panier.actif = 1;"
    // ,[
    //     ":titre" => $_POST["titre"],
    //     ":email" =>  $_SESSION["email"],
        
    // ]);
    $panier = getPanier($_POST["isbn"],$db);
    if(!empty($panier)){
        updateQtePanier($_POST["qte"],$_SESSION["email"],$_POST["isbn"],$db);
    }
    else{
        insertPanier($_SESSION["email"],$_POST["isbn"],$_POST["qte"],$db);
    }
    
    $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);

   }
else{
    $prix_total = $_POST["qte"] * $_POST["prix"];
    $in = false;
    foreach ($_SESSION["panier"] as $key=>$panier) {
            if ($panier["titre"]===$_POST["titre"]) {
                $_SESSION["panier"][$key]["qte"] =$_SESSION["panier"][$key]["qte"] + $_POST["qte"] ;
                
                $_SESSION["panier"][$key]["prix"] =$_SESSION["panier"][$key]["prix"] + $prix_total ;
                $in = true;
            }
    }
    if(!$in){
                $infos =  $db->fetch("SELECT livre.id_livre,livre.auteur from livre where livre.titre = :titre  ;"
            ,[
                ":titre" => $_POST["titre"],
                ]);
            
            $_SESSION["panier"][] = [
                "id_livre" => $infos["id_livre"] ,
                "titre" => $_POST["titre"],
                "auteur" => $infos["auteur"],
                "qte" => $_POST["qte"],
                "prix" => $prix_total,
            ];
            
    }
    $_SESSION["prix_panier"] = $_SESSION["prix_panier"] + $prix_total;

    $_SESSION["nb_panier"] = sizeof($_SESSION["panier"]);
    
}
updatePopulaireLivre($_POST["qte"],$_POST["isbn"],$db);
 //faudra avec un try & catch
 $ajouter = true;
$lien = "/storeCart";
$titre = $_POST["titre"];
echo "<script defer>window.location.replace('index.php?page=/&ajouter=true')</script>";