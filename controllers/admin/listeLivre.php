<?php 
require "models/livre.php";
require "models/livre_auteur.php";
$livres = getAllLivre($db);
require "views/admin/listeLivre.view.php";