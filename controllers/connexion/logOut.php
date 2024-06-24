<?php 

if (isset($_POST["destroy"])) {
   unset($_SESSION["email"]);
   unset($_SESSION["nb_panier"]);
   unset($_SESSION["panier"]);
   $_SESSION["anniversaire"] == false;
   unset($_SESSION["anniversaire"]);
}
replace("/");
