<?php 
require "models/style.php";
require "models/livre.php";
$styles = getAllStyle($db);
if (isset($_POST["isbn"])) {
    $voila =insertLivre($_POST["isbn"],$_POST["titre"],$_POST["date_parution"],$_POST["nb_page"],$_POST["prix"],$_POST["description"],$_POST["style"],$db);
    dd($voila);
}





require "views/admin/ajouterLivre.view.php" ; 