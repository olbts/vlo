<?php 
function getFiltreLivres($ordre,$prixmin,$prixmax,$styles,$pdo  ){
    $sql = "";
    $sql = $sql . 'SELECT * FROM `livre`  WHERE prix >= '.$prixmin.' AND prix <= '.$prixmax.' AND style IN ( "%default%" ';
    foreach ($styles as $key => $value) {
        $sql = $sql . ',"'.$value.'"';
    }
    $sql = $sql .  ") ORDER BY prix $ordre LIMIT 10 ";
    // dd($sql);
    $requetePrepare = $pdo->prepare($sql);
    // $requetePrepare->bindParam(':offset', $offset, PDO::PARAM_STR);

    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function rechercheLivres($recherche,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from livre where titre LIKE '%$recherche%' or description LIKE '%$recherche%' or  style LIKE '%$recherche%' LIMIT 15 "
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
    
}
function getLivre($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        'SELECT livre.*,GROUP_CONCAT(auteur.`nom`," ",auteur.prenom) as auteur FROM `livre` join livre_auteur on livre_auteur.isbn = livre.isbn JOIN auteur on livre_auteur.id_auteur = auteur.id_auteur WHERE livre.isbn = :isbn;'
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function updatePopulaireLivre($qte,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE `livre` SET populaire = populaire + :qte WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':qte', $qte, PDO::PARAM_INT);
    $requetePrepare->execute();
    
    
}
function insertLivre($isbn,$titre,$date_parution,$nb_page,$prix,$description,$style,$pdo){
    $requetePrepare = $pdo->prepare(
        'INSERT INTO `livre`(`isbn`, `titre`,  `date_parution`, `nb_page`, `prix`, `description`, `style`) VALUES (:isbn,:titre,:date_parution,:nb_page,:prix,:description,:style) '
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':date_parution', $date_parution, PDO::PARAM_STR);
    $requetePrepare->bindParam(':nb_page', $nb_page, PDO::PARAM_INT);
    $requetePrepare->bindParam(':prix', $prix, PDO::PARAM_STR);
    $requetePrepare->bindParam(':description', $description, PDO::PARAM_STR);
    $requetePrepare->bindParam(':style', $style, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function updateLivre($isbn,$titre,$date_parution,$nb_page,$prix,$description,$style,$pdo){
    $requetePrepare = $pdo->prepare(
        "UPDATE `livre` SET `titre`= :titre,`date_parution`=:date_parution,`nb_page`=:nb_page,`prix`=:prix,`description`=:description,`style`=:style WHERE `isbn`= :isbn"
        // 'INSERT INTO `livre`(`isbn`, `titre`,  `date_parution`, `nb_page`, `prix`, `description`, `style`) VALUES (:isbn,:titre,:date_parution,:nb_page,:prix,:description,:style) '
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':date_parution', $date_parution, PDO::PARAM_STR);
    $requetePrepare->bindParam(':nb_page', $nb_page, PDO::PARAM_INT);
    $requetePrepare->bindParam(':prix', $prix, PDO::PARAM_STR);
    $requetePrepare->bindParam(':description', $description, PDO::PARAM_STR);
    $requetePrepare->bindParam(':style', $style, PDO::PARAM_STR);
    $requetePrepare->execute();
}
function deleteLivre($isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "DELETE FROM `livre` WHERE isbn = :isbn"
    );
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $requetePrepare->execute();
}

function getAllLivre($pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from livre" 
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function maxPrix($pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT MAX(prix) as prix from livre" 
    );
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC)["prix"];
}
function minPrix($pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT MIN(prix) as prix from livre" 
    );
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC)["prix"];
}
function getLivreStyle($style,$isbn,$pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT *  FROM `livre` WHERE style = :style AND isbn NOT LIKE :isbn LIMIT 4"
    );
    $requetePrepare->bindParam(':style', $style, PDO::PARAM_STR);
    $requetePrepare->bindParam(':isbn', $isbn, PDO::PARAM_STR);

    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);

}
