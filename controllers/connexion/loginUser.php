<?php



if (isset($_POST["email"])&&isset($_POST["password"])) {
   
    
$errors = [];

    if (! $verif::email($_POST['email'])) {
        $errors['email'] = 'Adresse email invalide.';
        
        require "controllers/connexion/index.php";
    }

    if (empty($errors)) {
        $email = $_POST["email"];
        $password = $_POST["password"];
       
   
    $test = $db->fetch("Select * from utilisateur where email = :email "
    ,[
        ":email"=>$email,
        
    ]);
    
    if (empty($test["password"]) || empty($test["email"])) {
        $currentEmail = $_POST["email"];
        
        $errors['password'] = 'Mot de passe incorrect';
        require "controllers/connexion/index.php";

    }
    
    else if (password_verify($password,$test["password"])) {
        $session->setSession($test["email"]);
        $id_panier =  $db->fetch("SELECT panier.id_panier from panier,utilisateur where  panier.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.email =:email AND panier.actif = 1;"
    ,[
       
        ":email" =>  $_SESSION["email"],
        
    ])["id_panier"];
    
        foreach ($_SESSION["panier"] as $panier) {
            $db->insert("INSERT INTO `livre_panier`( `id_panier`, `id_livre`, `qte`,`prix`) VALUES (:id_panier,:id_livre,:qte,:prix) "
,[
    ":id_panier"=>$id_panier,
    ":id_livre"=>$panier["id_livre"],
    ":qte"=> $panier["qte"],
    ":prix"=>$panier["prix"],]);
        }
    
        echo "<script>window.location.replace('index.php?page=/')</script>";
    
    } else {
        $currentEmail = $_POST["email"];
        $errors['password'] = 'Mot de passe incorrect';
        
        require "controllers/connexion/index.php";
    }
    
    }
    }
    else{
       //je sais pas quoi mettre ici 
       echo "une erreur s'est produite" ;
    }
   







