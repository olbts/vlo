<?php 

function getClient($email,$pdo){
    $requetePrepare = $pdo->prepare(
        // "SELECT client.email AS email ,client.password AS password FROM client WHERE client.email = :email AND client.password = :password"
        "SELECT client.email AS email, client.password AS password "
        
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
