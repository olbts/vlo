<?php

require "models/client.php";
if(!estConnecte()){
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
if (isset($_POST["supprimer"])) {
    deleteClient($_SESSION["email"],$db);
    unset($_SESSION["email"]);
    unset($_SESSION["nb_panier"]);
    unset($_SESSION["panier"]);
    echo "<script>window.location.replace('index.php?page=/')</script>";
            exit();
}
require "views/compte/supprimerCompte.view.php";