<?php if(!estAdmin() && $lien != "/admin"): ?>

<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary  ">
  <div class="container-fluid justify-content-between">
    <div class="d-flex">
      <a class="navbar-brand " href="<?= url("/")?>"><h1 class="text-danger">Vivlio</h1></a>
    </div>
    <ul class="navbar-nav order-md-1 order-5  d-md-flex">
      <form action="index.php" method="GET" >
          <div class="input-group  ">
            <input type="hidden" name="page" value ="/resultat"> 
          <input type="search" placeholder="Search" name="barre" id="" class="m-0  form-control ">
        <button type="submit" class="m-0  input-group-text btn btn-danger">Q</button>
          </div>
        
        </form>
    </ul>
    <ul class="navbar-nav order-md-5 order-1  flex-row">
    <li class="nav-item ">
        <a class='btn btn-outline-secondary btn_panier ' href='index.php?page=/displayCart' >
        <img src='public/img/panier.png' width='30' height='30' alt='voila' class='rounded-circle '>
        <span class="panier">Panier</span>  <span class="nb_panier"><?=$_SESSION["nb_panier"]?></span>
</a>
      </li>
      <li class="nav-item ">
          <?= account()?>
      </li>
    </ul>
  </div>
</nav>


<?php endif; ?>
<div class="container">



