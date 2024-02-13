<?php 

function insertRetrait($email,$pdo){
    $code = rand(0000,9999);
    $date_commande = date('Y-m-d') ;
    $date_retrait = date('Y-m-d',strtotime("+7 day", strtotime($date_commande)));
    $id_boutique = 1 ; //à changer
    $requetePrepare = $pdo->prepare(
        "INSERT INTO `retrait`(`code`, `date_commande`, `date_retrait`, `id_boutique`, `email`) VALUES (:code,:date_commande,:date_retrait,:id_boutique,:email)"
        
        
    );
    $requetePrepare->bindParam(':code', $code, PDO::PARAM_INT);
    $requetePrepare->bindParam(':date_commande', $date_commande, PDO::PARAM_STR);
    $requetePrepare->bindParam(':date_retrait', $date_retrait, PDO::PARAM_STR);
    $requetePrepare->bindParam(':id_boutique', $id_boutique, PDO::PARAM_STR);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);

    $requetePrepare->execute();
    return $code;
    
}