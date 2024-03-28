<?php
require "Database.php";
require "Verification.php";
require "Article.php";
require "functions.php";
require "routes.php";
session_start();
sessionIni();
$db = databaseIni();
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
    replace("/");
}
require "views/partials/footer.php";