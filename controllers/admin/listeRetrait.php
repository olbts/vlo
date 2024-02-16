<?php 
require "models/retrait.php";

$retraits = getAllRetraitAdmin($db);
require "views/admin/listeRetrait.view.php";