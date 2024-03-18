<?php 

if (isset($_POST["destroy"])) {
    
    unset($_SESSION["email"]);
   unset($_SESSION["nb_panier"]);
   unset($_SESSION["panier"]);
    
}
echo "<script>window.location.replace('index.php')</script>";
