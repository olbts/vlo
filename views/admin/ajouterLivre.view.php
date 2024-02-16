<div class=" bg bg-info text-center">
    <h1 class="text-danger">Admin Panel</h1>
</div>


<div class="row">
        <div class="col-md-3 col-0">
            <?php require "views/partials/sideAdmin.php"?>
        </div>
        <div class="col-md-6 col-12 border border-info p-2">
            <div class="row">
            <h1>Ajouter Livre</h1>
            <form action="index.php?page=/ajouterLivre" method="post">
                        <div class="col-md-6 col-12">
                            <label for="isbn">Isbn :</label><br><input id="isbn" name="isbn" type="text"><br><br>
                            <label for="titre">Titre :</label><br><input id="titre" name="titre" type="text"><br><br>
                            <label for="date_parution">Date de parution :</label><br><input id="date_parution" name="date_parution" type="date"><br><br>
                            <label for="nb_page">Nombre de pages:</label><br><input id="nb_page" name="nb_page" type="number">
                            <label for="nom_auteur">Nom auteur :</label><input type="text" id="nom_auteur" name="nom_auteur">
                            <label for="prenom_auteur">Prénom auteur :</label><input type="text" id="prenom_auteur" name="prenom_auteur">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="prix">Prix</label><br><input id="prix" name="prix" type="text"><br><br>
                            <label for="description">Description :</label><br><textarea id="description" name="description"  cols="30" rows="3"></textarea><br><br>
                            <label for="style">Style :</label><br>
                            <select name="style" id="style">
                                <?php foreach ($styles as  $style) : ?>
                                    <option value="<?=$style["style"]?>"><?=$style["style"]?></option>
                                <?php endforeach ?>
                            </select><br><br>
                            <button type="submit">Ajouter</button>
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