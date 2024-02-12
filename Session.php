<?php

class Session 
{
    private $id ;
     
    public function __construct() {
        session_start();
        $this->id = session_id();
        
    }
    
    
    public static function destroy(){
        session_unset();
        unset($_SESSION);
    }
    public  function setSession($email){
        
        $_SESSION["email"] = $email;
        
    }
    public function getId(){
        
        return $this->id;
    }
}