<?php 

function insertLivre_auteur($isbn,$id_auteur,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `livre_auteur`(`isbn`, `id_auteur`) VALUES (:isbn,:id_auteur) '
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':id_auteur', $id_auteur, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function updateLivre_auteur($isbn,$id_auteur,$pdo){
    $requetePrepare = $pdo->prepare(
        'UPDATE `livre_auteur` SET `id_auteur`=:id_auteur WHERE isbn = :isbn '
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':id_auteur', $id_auteur, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function deleteLivre_auteur($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `livre_auteur` WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function deleteLivre_auteurId($id_auteur,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `livre_auteur` WHERE id_auteur = :id_auteur"
    );
    $requetePrepare->bindParam(':id_auteur', $id_auteur, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function getLivre_Auteur($id_auteur,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT *  FROM `livre_auteur` WHERE  id_auteur = :id_auteur "
    );
    $requetePrepare->bindParam(':id_auteur', $id_auteur, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}