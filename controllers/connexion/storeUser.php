<?php
require "models/client.php";
require "models/panier.php";

if (isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["password2"])) {
   $errors = [];
    if (! $verif::email($_POST['email'])) {
            $errors['email'] = 'Adresse email invalide.';
        }
        if (! $verif::password($_POST['password'])) {
            $errors['password'] = '8 caracteres minimum, dont une majuscule,une minuscule,un chiffre et un caractere special';
        }
        if (! $verif::equalPassword($_POST['password'],$_POST['password'])) {
            $errors['equalPassword'] = 'Les mots de passe ne correspondent pas ';
        }
        $client = getClient($_POST["email"],$db);
        if ( !empty($client)) {
            $errors['email'] = 'Adresse email deja prise';
        }
        if (empty($errors)) {
            $email = $_POST["email"];
            $crypted = password_hash($_POST["password"],PASSWORD_DEFAULT);
            insertClient(($_POST["email"]),$crypted,$db);
            if(!empty($_SESSION["panier"])){
                foreach ($_SESSION["panier"] as $panier) {
                    insertPanier($_POST["email"],$panier["isbn"],$panier["qte"],$db);
                }
            }
           $_SESSION["email"] = $_POST["email"];
           replace("/");
        } else {
            $currentEmail = $_POST["email"];
            require "views/connexion/register.view.php";
            }
    }
    else{
        require "views/connexion/register.view.php";
    }
       