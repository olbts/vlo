<?php

function getAdmin($login,$password,$pdo)
{
    $requetePrepare = $pdo->prepare(
        "SELECT * FROM admin WHERE login = :login AND password = :password"
       );
    $requetePrepare->bindParam(':login', $login, PDO::PARAM_STR);
    $requetePrepare->bindParam(':password', $password, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
