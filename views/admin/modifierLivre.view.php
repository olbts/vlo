<div class=" bg bg-info text-center">
    <h1 class="text-danger">Admin Panel</h1>
</div>

<div class="row">
        <div class="col-md-3 col-0">
            <?php require "views/partials/sideAdmin.php"?>
        </div>
        <div class="col-md-6 col-12 border border-info p-2">
            <div class="row">
                        <div class="col-md-6 col-12">
                        <h1>Modifier Livre</h1>
                        <form action="index.php?page=/modifierLivre" method="post">
                            <label for="isbn">Isbn :</label><br><input  value="<?=$livre["isbn"]?>" id="isbn" name="isbn" type="text"><br><br>
                            <label for="titre">Titre :</label><br><input value="<?=$livre["titre"]?>" id="titre" name="titre" type="text"><br><br>
                            <label for="date_parution">Date de parution :</label><br><input value="<?=$livre["date_parution"]?>" id="date_parution" name="date_parution" type="date"><br><br>
                            <label for="nb_page">Nombre de pages:</label><br><input value="<?=$livre["nb_page"]?>" id="nb_page" name="nb_page" type="number"><br><br>
                            <label for="prix">Prix</label><br><input value="<?=$livre["prix"]?>" id="prix" name="prix" type="text"><br><br>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="description">Description :</label><br><textarea id="description" name="description"  cols="30" rows="3"> <?=$livre["description"]?></textarea><br><br>
                            <label for="nom_auteur">Nom auteur :</label><br><input value="<?=$nom_auteur?>" type="text" id="nom_auteur" name="nom_auteur"><br><br>
                            <label for="prenom_auteur">Prénom auteur :</label><br><input value="<?=$prenom_auteur?>" type="text" id="prenom_auteur" name="prenom_auteur"><br><br>
                            <label for="style">Style :</label><br>
                            <select value="<?=$livre["style"]?>" name="style" id="style">
                                <?php foreach ($styles as  $style) : ?>
                                    <option <?php if($livre["style"] == $style["style"] ) echo "selected"; ?> value="<?=$style["style"]?>"><?=$style["style"]?></option>
                                <?php endforeach ?>
                            </select><br><br>
                            <button type="submit">Modifier</button>
                        </div>
            </div>
        </div>
        <div class="col-md-3 col-0">

        </div>
    
</div>
        
        
</form>


            
        <!-- isbn 	
		titre		
		populaire		
		date_parution	
		nb_page	
		prix		
		description		
		style  -->