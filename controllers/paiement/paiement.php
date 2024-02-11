<?php 

$page = "/paiement";
$title = "paiement";
$errors = [];
if(!isset($_SESSION["email"])){
    $errors["email"] = "vous devez être connecté";
        require "../controllers/cart/displayCart.php";
        die();
}
$SQLidPanieridUser = "SELECT panier.id_panier,utilisateur.id_utilisateur,livre_panier.id_livre_panier from panier,utilisateur,livre_panier where panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND panier.actif = 1 AND livre_panier.id_panier = panier.id_panier;";
$SQLajouterCommande = "INSERT INTO `commande`(  `id_panier`,date_debut) VALUES (:id_panier,:date_debut) ";
$SQLupdateCurrentPanier = "UPDATE `panier` SET actif = 0 WHERE id_panier = :id_panier;";
$SQlnouveauPanier = "INSERT INTO `panier`(  `id_utilisateur`) VALUES (:id_utilisateur) ";
    $moyen_paiement = "cheque"; //à changer
    $infos =  $db->fetch($SQLidPanieridUser
    ,[
        
        ":email" =>  $_SESSION["email"],
        
    ]);
    $date = date('Y-m-d') ;
    if (empty($infos)) {
        $errors["vide"] = "votre panier est vide";
        require "controllers/cart/displayCart.php";
        die();
    }
    $db->insert($SQLajouterCommande
    ,[
        
        ":id_panier"=>$infos["id_panier"],
       
        ":date_debut" => $date,
       
    ]); 
$db->query($SQLupdateCurrentPanier,
[
    ":id_panier" => $infos["id_panier"],
    
]);
$db->insert($SQlnouveauPanier
            ,[
                
                ":id_utilisateur"=>$infos["id_utilisateur"],
            ]); 



require "views/paiement/paiement.view.php";