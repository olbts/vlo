<?php 



function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}
function url($value = "/",$arg=[]){
    echo "index.php?page={$value}";
    foreach ($arg as $key => $value) {
        echo "&".$key."=".$value;
    }
}
function partial($value = ""){
    require "views/partials/{$value}.php";
}
function active($value,$page){
    if ($page == $value) {
        echo "active";

    } 
}
function img($isbn){
    echo "public/img/livres/".$isbn.".png";
    // echo "http://books.google.com/books/content?id=".$value."&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api";
}

function cart(){
     if (isset($_SESSION["email"])) {
        // <a class="nav-link " href="<?= url("/about")
        echo "<a class='btn btn-outline-success'href='/gah/index.php?page=/cart' >
        <img src='views/img/cart.png' width='30' height='30' alt='voila' class='rounded-circle'>
        Cart
        </a>";
     }
}
function account(){
    if (isset($_SESSION["email"])) {
echo '<div btn_connexion>
        <button type="button" class=" btn btn-outline-dark mx-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <img src="public/img/profil.png" width="30" height="30" alt="voila" class="rounded-circle">
        </button>
        <ul class="dropdown-menu dropdown-menu-start p-2 dropdown-menu-lg-end">
            <li class="dropdown-item">
                <a class="btn btn-link text-center" href="index.php?page=/compte"> Compte</a>
            </li>
            <li class="dropdown-item">
                <form class="" action="index.php?page=/logOut" method="post">
                <input type="hidden" name="destroy" value="destroy">
                <button type="submit" class="btn btn-link text-center"> Déconnexion</a>
                </form>
            </li>
                
        </ul>
        </div>
        
    
        ';
    }
    else{
        echo "<a class='mx-3 py-2 btn btn-outline-dark btn_connexion' href='index.php?page=/connexion' >
            Connexion
        </a>";
    }


}
function filtre($ordre,$prixmin,$prixmax,$styles){
    $sql = "";
    $sql = $sql . 'SELECT * FROM `livre` WHERE prix > '.$prixmin.' AND prix < '.$prixmax.' AND style IN ( "%default%" ';
    foreach ($styles as $key => $value) {
        $sql = $sql . ',"'.$value.'"';
    }
    $sql = $sql .  ") ORDER BY prix $ordre";
    return $sql;

}
function checked($array,$value){
    
    if(in_array($value,$array) == true){
        echo "checked";
    }
    
}

function estConnecte()
{
    return isset($_SESSION['email']);
}
function estGerant()
{
    return isset($_SESSION['admin']) && $_SESSION['admin'] == "gerant";
}
function estAdmin(){
    return isset($_SESSION['admin']);
}

function ajd(){
    return gmdate("Y-m-d",time());
}
function formatIsbn($isbn){
    $isbn = substr_replace($isbn, "-", 3, 0);
    $isbn = substr_replace($isbn, "-", 5, 0);
    $isbn = substr_replace($isbn, "-", 10, 0); 
    $isbn = substr_replace($isbn, "-", 15, 0); 
    return $isbn;
}
function jsScript($lien){
    $lien =  substr($lien,1);;
    if($lien == ""){
        $lien = "index";
    }
    $path = "public/js/".$lien.".js";
    if(file_exists($path)){
        echo '<script src="'.$path.'"></script>';
    }
    else{
        echo '<script src="public/js/generic.js"></script>';
    }
}
function replace($lien = "/"){
    echo "<script>window.location.replace('index.php?page=".$lien."')</script>";
                exit();
}
function sessionIni(){
    if(empty($_SESSION["nb_panier"])){
        $_SESSION["nb_panier"] = 0;
        $_SESSION["panier"] = [];
        $_SESSION["prix_panier"] = 0;
        
    }
}
function databaseIni(){
    try {
        $db = Database::getPdoGsb();
        return $db;
    } catch (\Throwable $th) {
        require "views/main/error.view.php";
        die();
    }
}