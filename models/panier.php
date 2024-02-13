<?php 

function insertPanier($email,$isbn,$qte,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `panier`(`email`, `isbn`, `qte`)'
        .' VALUES (:email,:isbn,:qte) '
        
        
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function getPanier($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        'SELECT *from panier where panier.isbn = :isbn'
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetchAll();
}
function updateQtePanier($qte,$email,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE panier SET qte = qte + :qte WHERE isbn = :isbn AND email = :email"
    );
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->execute();
    
}
function taillePanier($email,$pdo){
    $requetePrepare = $pdo->prepare(
        'SELECT COUNT(*) FROM panier where email = :email'
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetch()[0];
    
}
function getAllPanier($email,$pdo){
    $requetePrepare = $pdo->prepare(
        'SELECT * FROM panier JOIN livre on panier.isbn = livre.isbn where email = :email'
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetchAll();
}

function getPrixPanier($email,$pdo)
{
    $requetePrepare = $pdo->prepare(
        'SELECT SUM(livre.prix * panier.qte) FROM panier JOIN livre on panier.isbn = livre.isbn where email = :email  '
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetch()[0];
}
function deletePanier($isbn,$email,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM panier WHERE isbn = :isbn AND email = :email"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
}
function deleteAllPanier($email,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM panier WHERE email = :email"
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
}