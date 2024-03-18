<?php

if(!estConnecte()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
$page = "/supprimerCompte";

require "views/compte/supprimerCompte.view.php";