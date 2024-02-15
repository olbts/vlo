<?php

function getAllStyle($pdo){
    $requetePrepare = $pdo->prepare(
        "SELECT * from style "
    );
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}