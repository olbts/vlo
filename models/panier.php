<?php 

function insertPanier($email,$isbn,$qte,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `panier`(`email`, `isbn`, `qte`) VALUES (:email,:isbn,:qte) '
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function getPanier($email,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        'SELECT * from panier where panier.isbn = :isbn AND email = :email'
    );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function updateQtePanier($qte,$email,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE panier SET qte = qte + :qte WHERE isbn = :isbn AND email = :email"
    );
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
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
        "SELECT panier.qte * livre.prix as prixtotal , panier.qte,livre.*,GROUP_CONCAT(auteur.nom,auteur.prenom) as auteur FROM panier 
        JOIN livre on livre.isbn = panier.isbn join livre_auteur on livre.isbn =livre_auteur.isbn 
        JOIN auteur on auteur.id_auteur = livre_auteur.id_auteur
        WHERE panier.email = :email GROUP BY panier.isbn"
       );
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
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
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
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
function deletePanierIsbn($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `panier` WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function updatePanier($qte,$email,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE panier SET qte =  :qte WHERE isbn = :isbn AND email = :email"
    );
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}