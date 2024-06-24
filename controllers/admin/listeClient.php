<?php 
 if(!estGerant()){
    replace("/");
}
require "models/client.php";
$clients = getAllClient($db);

require "views/admin/listeClient.view.php";