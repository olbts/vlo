<?php 

function getAuteur($nom,$prenom,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM auteur WHERE nom = :nom AND prenom = :prenom"
       );
    $requetePrepare->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requetePrepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function insertAuteur($nom,$prenom,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `auteur`(`nom`, `prenom`) VALUES (:nom,:prenom) '
    );
    $requetePrepare->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requetePrepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function getAllAuteur($pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from auteur" 
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function deleteAuteur($id_auteur,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `auteur` WHERE id_auteur = :id_auteur"
    );
    $requetePrepare->bindParam(':id_auteur', $id_auteur, PDO::PARAM_INT);
    $requetePrepare->execute();
}