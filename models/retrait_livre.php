<?php 

function insertRetraitLivre($code,$email,$pdo){
   
    $requetePrepare = $pdo->prepare(
        "INSERT INTO `retrait_livre`(`isbn`, `code`, `qte`)  SELECT panier.isbn,retrait.code,panier.qte FROM panier , retrait where panier.email = :email AND retrait.code = :code"
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':code', $code, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function deleteRetraitLivre($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `retrait_livre` WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
}



