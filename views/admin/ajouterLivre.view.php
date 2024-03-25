<div class="bg bg-body-tertiary  text-center">
    <h1 class="text-danger">Ajouter Livre</h1>
</div>


<div class="row">
        <div class="col-md-3 col-0">
            <?php require "views/partials/sideAdmin.php"?>
        </div>
        
        <div class="col-md-6 col-12">
        
            <div class=" ">
            <?php if(isset($banner)): ?>
                <h3 class="text-center text-danger"><?= $banner ?></h3>
            <?php endif; ?>
            <form action="index.php?page=/ajouterLivre" method="post" enctype="multipart/form-data" >
                        <div class="displayLivre">
                            <div class="couple">
                                <label for="isbn">Isbn :</label><input id="isbn" name="isbn" type="text" value='<?= $currentIsbn ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="titre">Titre :</label><input id="titre" name="titre" type="text" value='<?= $currentTitre ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="date_parution">Date de parution :</label><input id="date_parution" name="date_parution" type="date" value='<?= $currentDate ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="nb_page">Nombre de pages :</label><input id="nb_page" name="nb_page" type="number" value='<?= $currentPage ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="nom_auteur">Nom auteur :</label><input type="text" id="nom_auteur" name="nom_auteur" value='<?= $currentNom ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="prenom_auteur">Prénom auteur :</label><input type="text" id="prenom_auteur" name="prenom_auteur" value='<?= $currentPrenom ??""?>'>
                            </div>
                            <div class="couple">
                            <label for="file">Fichier :</label>
        <input type="file" name="file" value='<?= $currentFichier ??""?>'>
                            </div>
                                <div class="couple">
                            </div>
                            <div class="couple">
                                <label for="prix">Prix :</label><input id="prix" name="prix" type="text" value='<?= $currentPrix ??""?>'>
                            </div>
                            <div class="couple">
                                <label for="description">Description :</label><textarea id="description" name="description"  cols="30" rows="3"><?= $currentDescription ??""?></textarea>
                            </div>
                            <div class="couple">
                            <label for="style">Style :</label>
                            <select name="style" id="style">
                                <?php foreach ($styles as  $style) : ?>
                                    <option value="<?=$style["style"]?>"><?=$style["style"]?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        
                        
                        <div class="buttonDiv">
                        <button class="btn btn-success justify-self-center" type="submit ">Ajouter</button>

                        </div>
                        
            </div>
        </div>
        <div class="col-md-3 col-0">

        </div>
    
</div>
        
        
</form>
<!-- <style>
    .buttonDiv{
        display: flex;
        justify-content:right ;
    }
    .displayLivre{
        
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding : 10px;
    }
    .couple{
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    input,textarea,select{
        border: 0.1px solid black;
    }
</style> -->


            
        <!-- isbn 	
		titre		
		populaire		
		date_parution	
		nb_page	
		prix		
		description		
		style  -->