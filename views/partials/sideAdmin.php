
<a href="index.php?page=/listeRetrait" ><h5>Liste commandes</h5></a>
    <hr>
<?php if ($_SESSION["admin"] == "gerant") { ?>
    <a href="index.php?page=/listeLivre"><h5>Liste livres</h5></a>
<hr>
<a href="index.php?page=/listeAuteur"><h5>Liste Auteur</h5></a>
<hr>
<?php } ?>
<form action="index.php?page=/admin" method="post"><input name="logout" value="true" type="hidden"> <button class="btn btn-danger">Déconnexion</button></form>