<?php

require "models/client.php";
require "models/panier.php";

if (isset($_POST["email"])&&isset($_POST["password"])) {

    
    $errors = [];

    if (! $verif::email($_POST['email'])) {
        $errors['email'] = 'Adresse email invalide.';
        
        require "controllers/connexion/index.php";
    }

    if (empty($errors)) {
        $email = $_POST["email"];
        $password = $_POST["password"];
    
       
   
    $client = getClient($_POST["email"],$db);
   
    
    if (empty($client)) {
        $currentEmail = $_POST["email"];
        $errors['password'] = 'Mot de passe incorrect';
        require "controllers/connexion/index.php";
    }
    
    else if (password_verify($_POST["password"],$client["password"])) {
        $_SESSION["email"] = $client["email"];
       foreach ($_SESSION["panier"] as $panier) {
            insertPanier($client["email"],$panier["isbn"],$panier["qte"],$db);
       }
    
        echo "<script>window.location.replace('index.php?page=/')</script>";
    } 
    else {
        $currentEmail = $_POST["email"];
        $errors['password'] = 'Mot de passe incorrect';
        
        require "controllers/connexion/index.php";
    }
    
    }
    else {
        $errors['password'] = "Une erreur s'est produite";
        
        require "controllers/connexion/index.php";
    }
    }
    
   














