<?php 

function getClient($email,$pdo){
    $requetePrepare = $pdo->prepare(
        // "SELECT client.email AS email ,client.password AS password FROM client WHERE client.email = :email AND client.password = :password"
        "SELECT email,nom,prenom,adresse,dob , client.password AS password "
        
        . 'FROM client '
        . "WHERE client.email = :email "
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function insertClient($email,$password,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `client`(`email`, `password`)'
        .' VALUES (:email,:password) '
        );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':password', $password, PDO::PARAM_STR);
    
    $requetePrepare->execute();
}
function deleteClient($email,$pdo){
    $requetePrepare = $pdo->prepare(
        'DELETE FROM client WHERE email = :email'
        );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
}
function updateClient($email,$password,$pdo){
    $requetePrepare = $pdo->prepare(
        'UPDATE `client` SET `password`= :password WHERE email = :email '
        );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':password', $password, PDO::PARAM_STR);
    
    $requetePrepare->execute();
}
function updateClientInfos($email,$nom,$prenom,$dob,$adresse,$pdo){
    $requetePrepare = $pdo->prepare(
        'UPDATE `client` SET
         `nom`= :nom ,
         `prenom`= :prenom ,
         `dob`= :dob ,
         `adresse`= :adresse WHERE email = :email '
        );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requetePrepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requetePrepare->bindParam(':dob', $dob, PDO::PARAM_STR);
    $requetePrepare->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    
    
    $requetePrepare->execute();
}
function getAllClient($pdo){
    $requetePrepare = $pdo->prepare(
        // "SELECT client.email AS email ,client.password AS password FROM client WHERE client.email = :email AND client.password = :password"
        "SELECT client.email,nom,prenom,dob 
        
        FROM client "
      
    );
   
    
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}