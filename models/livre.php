<?php 
function getFiltreLivres($ordre,$prixmin,$prixmax,$styles,$pdo){
    $sql = "";
    $sql = $sql . 'SELECT * FROM `livre`  WHERE prix > '.$prixmin.' AND prix < '.$prixmax.' AND style IN ( "%default%" ';
    foreach ($styles as $key => $value) {
        $sql = $sql . ',"'.$value.'"';
    }
    $sql = $sql .  ") ORDER BY prix $ordre";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function rechercheLivres($recherche,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from livre where titre LIKE '%$recherche%' or description LIKE '%$recherche%' or auteur LIKE '%$recherche%'or  style LIKE '%$recherche%'  "
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
    
}
function getLivre($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT livre.*,GROUP_CONCAT(auteur.`nom`,auteur.prenom) as auteur FROM `livre` join livre_auteur on livre_auteur.isbn = livre.isbn JOIN auteur on livre_auteur.id_auteur = auteur.id_auteur WHERE livre.isbn = :isbn;"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function updatePopulaireLivre($qte,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE `livre` SET populaire = populaire + :qte WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->execute();
    
    
}
function insertLivre($isbn,$titre,$date_parution,$nb_page,$prix,$description,$style,$pdo){
    // $sql =         'INSERT INTO `livre`(`isbn`, `titre`,  `date_parution`, `nb_page`, `prix`, `description`, `style`) VALUES (:isbn,:titre,:date_parution,:nb_page,:prix,:description,:style ';

    $requetePrepare = $pdo->prepare(
        'INSERT INTO `livre`(`isbn`, `titre`,  `date_parution`, `nb_page`, `prix`, `description`, `style`) VALUES (:isbn,:titre,:date_parution,:nb_page,:prix,:description,:style '
    );
    // isbn,$titre,$date_parution,$nb_page,$prix,$description,$style
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':date_parution', $date_parution, PDO::PARAM_STR);
    $requetePrepare->bindParam(':nb_page', $nb_page, PDO::PARAM_INT);
    $requetePrepare->bindParam(':prix', $prix, PDO::PARAM_STR);
    $requetePrepare->bindParam(':description', $description, PDO::PARAM_STR);
    $requetePrepare->bindParam(':style', $style, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}



