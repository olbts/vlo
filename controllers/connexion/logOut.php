<?php 

if (isset($_POST["destroy"])) {
    
    unset($_SESSION["email"]);
   
    echo "<script>window.location.replace('index.php')</script>";
}
