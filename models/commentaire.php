<?php

function insertCommentaire($isbn,$email,$titre,$message,$note,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `commentaire`(`isbn`,`email`, `titre`,  `message`, `note`) VALUES (:isbn,:email,:titre,:message,:note) '
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':message', $message, PDO::PARAM_STR);
    $requetePrepare->bindParam(':note', $note, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function updateCommentaire($isbn,$email,$titre,$message,$note,$pdo){
    $requetePrepare = $pdo->prepare(
    "UPDATE commentaire SET `titre` = :titre ,`message` = :message , `note` = :note WHERE `isbn` = :isbn AND `email` = :email  ;"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':message', $message, PDO::PARAM_STR);
    $requetePrepare->bindParam(':note', $note, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function getCommentaire($isbn,$email,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from  commentaire where email = :email AND isbn = :isbn ;"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function getCommentaires($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from commentaire  WHERE isbn = :isbn;"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function getAvg($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT AVG(note) as note from commentaire WHERE isbn = :isbn  ;"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC)["note"];
}
function getCommentairesEmail($email,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from commentaire  WHERE email = :email;"
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}