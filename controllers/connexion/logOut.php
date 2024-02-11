<?php 

if (isset($_POST["destroy"])) {
    $session::destroy();
    // session_unset();
   
    echo "<script>window.location.replace('index.php')</script>";
}
