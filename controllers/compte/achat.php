<?php

require "models/retrait.php"; 
$page = "/achat";
$achat = new Article();

$achat = getRetrait($_GET["code"],$db);

require "views/compte/achat.view.php";