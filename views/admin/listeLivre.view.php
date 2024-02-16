<h1>Liste Livres</h1>
<?php  if(isset($_GET["success"])) : ?>
<h4>ce que vous vouliez faire a bien été fait</h4>
<?php endif ?>
<p><a href="index.php?page=/ajouterLivre">ajouter un livre</a></p>
<ul>
    <?php foreach ($livres as $livre) : ?>
        <li><a href="<?=url($value = "/modifierLivre",$arg=["isbn" => $livre["isbn"]])?>"><?=$livre["isbn"]?></a><form action="index.php?page=/supprimerLivre" method="post"><input type="hidden" name="isbn" value="<?=$livre["isbn"]?>"><button class="btn btn-danger">X</button></form></li>
    <?php endforeach ?>
</ul>