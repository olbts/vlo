<?php

function getAllBoutique($pdo)
{
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM boutique "
       );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function getBoutique($id_boutique,$pdo)
{
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM boutique where id_boutique = :id_boutique"
       );
    $requetePrepare->bindParam(':id_boutique', $id_boutique, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}