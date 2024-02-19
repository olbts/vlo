<?php 
require "models/admin.php";


if (isset($_POST["login"])) {
        $admin = getAdmin($_POST["login"],$_POST["password"],$db);
        if(!empty($admin)){
            $_SESSION["admin"] = $admin["login"];
            unset($_SESSION["email"]);
            echo "<script>window.location.replace('index.php?page=/listeRetrait')</script>";
            exit();
        }
    }
else if (estAdmin()) {
    if(isset($_POST["logout"])){
        unset($_SESSION["admin"]);
    }
    echo "<script>window.location.replace('index.php?page=/listeRetrait')</script>";
    exit();
}
else{
    require "views/admin/admin.view.php";
}