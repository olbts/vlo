<?php 

function insertRetrait($id_boutique,$email,$pdo){
    $code = rand(0000,9999);
    $date_commande = date('Y-m-d') ;
    $date_retrait = date('Y-m-d',strtotime("+7 day", strtotime($date_commande)));
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
function getAllRetrait($email,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM retrait WHERE email = :email"
       );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function getRetrait($code,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM retrait JOIN boutique on retrait.id_boutique = boutique.id_boutique WHERE code = :code"
       );
    $requetePrepare->bindParam(':code', $code, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function getAllRetraitAdmin($ajd,$pdo){
    $requetePrepare = $pdo->prepare(
        " SELECT retrait.code,retrait.date_commande,retrait.date_retrait,retrait.email , SUM(livre.prix*retrait_livre.qte) as prix_total,GROUP_CONCAT(retrait_livre.isbn) AS isbn,GROUP_CONCAT(retrait_livre.qte) AS qte,GROUP_CONCAT(livre.prix * retrait_livre.qte) AS prix FROM `retrait` JOIN retrait_livre ON retrait_livre.code = retrait.code JOIN livre on livre.isbn = retrait_livre.isbn WHERE retrait.date_commande <= :ajd AND retrait.date_retrait >= :ajd GROUP BY retrait.code;"
        
       );
    $requetePrepare->bindParam(':ajd', $ajd, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function deleteRetrait($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `retrait` WHERE code = :code"
    );
    $requetePrepare->bindParam(':code', $isbn, PDO::PARAM_STR);
    
    $requetePrepare->execute();
}