<?php 
require "models/admin.php";


if (isset($_POST["login"])) {
        $admin = getAdmin($_POST["login"],$_POST["password"],$db);
        if(!empty($admin)){
            $_SESSION["admin"] = $admin["login"];
            unset($_SESSION["email"]);
            replace("/listeRetrait");
            }
        }
else if (estAdmin()) {
    if(isset($_POST["logout"])){
        unset($_SESSION["admin"]);
    }
    replace("/listeRetrait");
}

require "views/admin/admin.view.php";
