<?php
require "Database.php";
require "Verification.php";
require "Article.php";
require "Session.php";
require "functions.php";
require "routes.php";
$db = new Database();
$session = new Session();
$verif = new Verification();
if(empty($_SESSION["nb_panier"])){
    $_SESSION["nb_panier"] = 0;
    $_SESSION["panier"] = [];
    $_SESSION["prix_panier"] = 0;
}
$lien = $_GET["page"] ?? "/";
require "views/partials/header.php";
 require "views/partials/nav.php";
if(array_key_exists($lien,$routes,)){
    require($routes[$lien]);
}
else {
    require "controllers/main/index.php";
}
 require "views/partials/footer.php";