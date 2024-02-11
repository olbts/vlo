<?php 

class Database {
    
    public $info;  
    public function __construct() {
        $dsn= "mysql:host=localhost;dbname=selida;user=root;password=";

        // $dsn= "mysql:host=sql306.infinityfree.com;dbname=if0_35730627_vivlio;user=if0_35730627;password=BaPcF1sZiFEI";
        $this->info = new PDO($dsn);
        
    }
    public function query($arg,$params=[]){
        $meh = $this->info->prepare($arg);
        $meh->execute($params);
        return $meh;
    }
    public function fetch($arg,$params=[]){
        $meh = $this->info->prepare($arg);
        $meh->execute($params);
        return $meh->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchAll($arg,$params=[]){
        $meh = $this->info->prepare($arg);
        $meh->execute($params);
        return $meh->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($arg,$params=[]){
        $meh = $this->info->prepare($arg);
        $meh->execute($params);
        
    }
    public function lastInsertid(){
        return $this->info->lastInsertid();
    }
}