<?php
require "Database.php";
require "Verification.php";
require "Article.php";
require "functions.php";
require "routes.php";
session_start();
try {
    $db = Database::getPdoGsb();
} catch (\Throwable $th) {
    echo "<h1 style='color:red;text-align:center;'>Site indisponible veuillez réessayer plus tard</h1>";
    die();
}

$verif = new Verification();
if(empty($_SESSION["nb_panier"])){
    $_SESSION["nb_panier"] = 0;
    $_SESSION["panier"] = [];
    $_SESSION["prix_panier"] = 0;
    
}
$lien = $_GET["page"] ?? "/";
if(estAdmin()){
    $routes = $adminRoutes;
}
require "views/partials/header.php";
require "views/partials/nav.php";
if(array_key_exists($lien,$routes)){
    require($routes[$lien]);
}
else {
    echo "<script>window.location.replace('index.php?page=/')</script>";
                exit();
}
 require "views/partials/footer.php";