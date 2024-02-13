<?php 

class Database {
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=vivlio';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoGsb = null;

    private function __construct()
    {
        Database::$monPdo = new PDO(
            Database::$serveur . ';' . Database::$bdd,
            Database::$user,
            Database::$mdp
        );
        Database::$monPdo->query('SET CHARACTER SET utf8');
    }

    public function __destruct()
    {
        Database::$monPdo = null;
    }
    public static function getPdo(){
        return Database::$monPdo;
    }
    public static function getPdoGsb()
    {
        if (Database::$monPdoGsb == null) {
            Database::$monPdoGsb = new Database();
        }
        return Database::$monPdoGsb::$monPdo;
    }
    public function getInfosVisiteur($login, $mdp)
    {
        $requetePrepare = Database::$monPdo->prepare(
            'SELECT visiteur.id AS id, visiteur.nom AS nom, '
            . 'visiteur.prenom AS prenom '
            . 'FROM visiteur '
            . 'WHERE visiteur.login = :unLogin AND visiteur.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    // public function getInfosVisiteur($login,$mdp,$pdo)
    // $visiteur = $pdo->getInfosVisiteur($login, $mdp);
    // public function query($arg,$params=[]){
    //     $meh = $this->info->prepare($arg);
    //     $meh->execute($params);
    //     return $meh;
    // }
    // public function fetch($arg,$params=[]){
    //     $meh = $this->info->prepare($arg);
    //     $meh->execute($params);
    //     return $meh->fetch(PDO::FETCH_ASSOC);
    // }
    // public function fetchAll($arg,$params=[]){
    //     $meh = $this->info->prepare($arg);
    //     $meh->execute($params);
    //     return $meh->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function insert($arg,$params=[]){
    //     $meh = $this->info->prepare($arg);
    //     $meh->execute($params);
        
    // }
    // public function lastInsertid(){
    //     return $this->info->lastInsertid();
    // }
}