<?php

require "models/client.php";
require "models/panier.php";

if (isset($_POST["email"])&&isset($_POST["password"])) {
    $errors = [];
    if (! $verif::email($_POST['email'])) {
        $errors['email'] = 'Adresse email invalide.';
        
        require "views/connexion/connexion.view.php";
    }
    if (empty($errors)) {
        $client = getClient($_POST["email"],$db);
        if (empty($client)) {
            $currentEmail = $_POST["email"];
            $errors['password'] = 'Mot de passe incorrect';
            require "views/connexion/connexion.view.php";
        }
        else if (password_verify($_POST["password"],$client["password"])) {
            $_SESSION["email"] = $client["email"];
            foreach ($_SESSION["panier"] as $panier) {
                    insertPanier($client["email"],$panier["isbn"],$panier["qte"],$db);
                }
            $_SESSION["nb_panier"] = taillePanier($_SESSION["email"],$db);
            replace("/");
        } 
        else {
            $currentEmail = $_POST["email"];
            $errors['password'] = 'Mot de passe incorrect';
            require "views/connexion/connexion.view.php";
        }
    }
    else {
        $currentEmail = $_POST["email"];
        $errors['password'] = "Une erreur s'est produite";
        require "views/connexion/connexion.view.php";
    }
}
else{
    require "views/connexion/connexion.view.php";
}
    
   















    
   














