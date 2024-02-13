<?php 
function getFiltreLivres($ordre,$prixmin,$prixmax,$styles,$pdo){
    $sql = "";
    $sql = $sql . 'SELECT * FROM `livre`  WHERE prix > '.$prixmin.' AND prix < '.$prixmax.' AND nom IN ( "%default%" ';
    foreach ($styles as $key => $value) {
        $sql = $sql . ',"'.$value.'"';
    }
    $sql = $sql .  ") ORDER BY prix $ordre";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll();
}
function rechercheLivres($recherche,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from livre where titre LIKE '%$recherche%' or description LIKE '%$recherche%' or auteur LIKE '%$recherche%'or  style LIKE '%$recherche%'  "
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll();
    
}
function getLivre($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "Select * from livre where isbn = :isbn "
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetch();
}
function updatePopulaireLivre($qte,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE `livre` SET populaire = populaire + :qte WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->execute();
    
    
}


