<?php       

Class Article 
{
    private $articles = [];
    public  function set(){
        return !empty($this->articles);
    }
    public function setArticles($arg){
        
            $this->articles = $arg ;        
         
    }
    public function getArticles(){
        return $this->articles;
    }
    public function destroy(){
        unset($articles);
    }
}