<?php 

$page = "/retirer";
$title = "retirer";
$errors = [];
if(!isset($_SESSION["email"])){
    $errors["email"] = "vous devez être connecté";
        require "controllers/cart/displayCart.php";
        die();
}
$code = rand(0000,9999);
$SQLidPanieridUser = "SELECT panier.id_panier,utilisateur.id_utilisateur,livre_panier.id_livre_panier from panier,utilisateur,livre_panier where panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND panier.actif = 1 AND livre_panier.id_panier = panier.id_panier;";
$SQLajouterRetrait = "INSERT INTO `retrait`(  `id_panier`,code,date_debut,date_fin) VALUES (:id_panier,:code,:date,:date_max) ";
$SQLupdateCurrentPanier = "UPDATE `panier` SET actif = 0 WHERE id_panier = :id_panier;";
$SQlnouveauPanier = "INSERT INTO `panier`(  `id_utilisateur`) VALUES (:id_utilisateur) ";
$infos =  $db->fetch($SQLidPanieridUser,
    [
        
        ":email" =>  $_SESSION["email"],
        
    ]);
    if (empty($infos)) {
        $errors["vide"] = "votre panier est vide";
        require "controllers/cart/displayCart.php";
        die();
    }
    $date = date('Y-m-d') ;
    $date_max = date('Y-m-d',strtotime("+7 day", strtotime($date)));
    
    
    $db->insert($SQLajouterRetrait,
    [
        
        ":id_panier"=>$infos["id_panier"],
        ":code" => $code, 
        ":date" => $date,
        ":date_max" => $date_max,
    ]); 
    $db->query($SQLupdateCurrentPanier,
    [
        ":id_panier" => $infos["id_panier"],
        
    ]);
    $db->insert($SQlnouveauPanier,
                [
                    
                    ":id_utilisateur"=>$infos["id_utilisateur"],
                ]); 
require "views/paiement/retirer.view.php";