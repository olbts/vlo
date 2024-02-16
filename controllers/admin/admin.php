<?php 
require "models/admin.php";

require "views/admin/admin.view.php";
if (estAdmin()) {
    echo "<script>window.location.replace('index.php?page=/listeRetrait')</script>";
    exit();
}
if (isset($_POST["login"])) {
    $admin = getAdmin($_POST["login"],$_POST["password"],$db);
    if(!empty($admin)){
        $_SESSION["admin"] = $admin["login"];
        echo "<script>window.location.replace('index.php?page=/listeRetrait')</script>";
        exit();
    }
}
else if(isset($_POST["logout"])){
   
    unset($_SESSION["admin"]);
    
    echo "<script>window.location.replace('index.php?page=/article)</script>";
    exit();

}