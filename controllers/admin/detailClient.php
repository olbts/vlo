<?php 

 if(!estGerant()){
    replace("/");
}
require "models/client.php";
if (isset($_POST["email"])) {
   
    updateClientInfos($_POST["email"],$_POST["nom"],$_POST["prenom"],$_POST["dob"],$_POST["adresse"],$db);
    $info = ["text-success" , "Infomartions personnelles modifiées !"];
}
$infos = getClient($_GET["email"],$db);
//dd($client);
require "views/admin/detailClient.view.php";
