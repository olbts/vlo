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