<?php

if(!estConnecte()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
$page = "/compte";
require "views/compte/compte.view.php";