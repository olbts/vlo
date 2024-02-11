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
function img($value){
    echo "public/img/sample.jpg";
    // echo "http://books.google.com/books/content?id=".$value."&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api";
}

function cart(){
     if (isset($_SESSION["tobesure"])) {
        // <a class="nav-link " href="<?= url("/about")
        echo "<a class='btn btn-outline-success'href='/gah/index.php?page=/cart' >
        <img src='views/img/cart.png' width='30' height='30' alt='voila' class='rounded-circle'>
        Cart
        </a>";
     }
}
function account(){
    if (isset($_SESSION["email"])) {

        echo '<div  class="dropdown mx-3">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
        <img src="public/img/profil.png" width="30" height="30" alt="voila" class="rounded-circle">
        </button>
        
        
          
        
        <form class="dropdown-menu p-4 dropdown-menu-end" action="index.php?page=/logOut" method="post">
       
          <a class="btn btn-link text-center" href="index.php?page=/compte"> Compte</a>
          
          <input type="hidden" name="destroy" value="destroy">
          <button type="submit" class="btn btn-link text-center"> Déconnexion</a>
          
          </form>
        ';
    }
    else{
        echo "<a class='mx-3 py-2 btn btn-outline-dark'href='index.php?page=/connexion' >
        
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
function sql(){
    $SQL = [
        "idPanieridUser" => "SELECT panier.id_panier,users.id_user from panier,users where   panier.id_user = users.id_user AND users.email =:email AND panier.current = 1;",
"ajouterCommande" => "INSERT INTO `commande`(  `id_panier`,moyen,date) VALUES (:id_panier,:moyen,:date) ",
"updateCurrentPanier" => "UPDATE `panier` SET current = 0 WHERE id_panier = :id_panier;",
"nouveauPanier" => "INSERT INTO `panier`(  `id_user`) VALUES (:id_user) ",
    ];
    return $SQL;
}