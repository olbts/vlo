<?php

if (isset($_POST["emaill"])&&isset($_POST["passwordd"])) {
   
    
    $errors = [];
    
        if (! $verif::email($_POST['emaill'])) {
            $errors['email'] = 'Adresse email invalide.';
            
            
        }
        if (! $verif::password($_POST['passwordd'])) {
            $errors['password'] = '8 caracteres minimum, dont une majuscule,une minuscule,un chiffre et un caractere special';
            
           
        }
        if (! $verif::equalPassword($_POST['passwordd'],$_POST['passworddd'])) {
            $errors['equalPassword'] = 'Les mots de passe ne correspondent pas ';
            
            
        }
        $test = $db->fetch("Select * from utilisateur where email = :email "
    ,[
        ":email"=>$_POST["emaill"],
        
    ]);
        if ( !empty($test["email"])) {
           
            $errors['email'] = 'Adresse email deja prise';}
        
        if (empty($errors)) {
            $email = $_POST["emaill"];
            $password=$_POST["passwordd"];
            $crypted = password_hash($password,PASSWORD_DEFAULT);
            $db->insert("INSERT INTO `utilisateur`( `email`, `password`) VALUES (:email,:password) "
            ,[
                ":email"=>$email,
                ":password"=>$crypted,
            ]); 
        $id_utilisateur = $db->lastInsertid();
        $db->insert("INSERT INTO `panier`(  `id_utilisateur`) VALUES (:id_user) "
            ,[
                
                ":id_user"=>$id_utilisateur,
            ]); 
        $id_panier = $db->lastInsertid();
        
        
            foreach ($_SESSION["panier"] as $panier) {
                $db->insert("INSERT INTO `livre_panier`( `id_panier`, `id_livre`, `qte`,`prix`) VALUES (:id_panier,:id_livre,:qte,:prix) "
    ,[
        ":id_panier"=>$id_panier,
        ":id_livre"=>$panier["id_livre"],
        ":qte"=> $panier["qte"],
        ":prix"=>$panier["prix"],]);
            }
            
            $session->setSession($email);
           
            echo "<script>window.location.replace('index.php?page=/')</script>";
    
            
            
        } else {
            $currentEmail = $_POST["emaill"];
            require "controllers/connexion/register.php";
            
        }
    }
       