<?php

require "models/client.php";
if(!estConnecte()){
    replace("/");
}
if (isset($_POST["supprimer"])) {
    deleteClient($_SESSION["email"],$db);
    unset($_SESSION["email"]);
    unset($_SESSION["nb_panier"]);
    unset($_SESSION["panier"]);
    replace("/");
}
require "views/compte/supprimerCompte.view.php";