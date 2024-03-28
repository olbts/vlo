<div class=" bg bg-body-tertiary text-center">
    <h1 class="text-danger">Modifier Livre</h1>
</div>
<div class="row">
        <div class="col-md-3 col-0">
            <?php require "views/partials/sideAdmin.php"?>
        </div>
        <div class="col-md-6 col-12 border border-info p-2">
        
            <div class="row">
                        <div class="col-md-6 col-12">
                        
                        <form action="index.php?page=/modifierLivre" method="post">
                        <input   value="<?=$livre["isbn"]?>" id="isbn" name="isbn" type="hidden">
                            <label for="isbn">Isbn :</label><br><input disabled  value="<?=$livre["isbn"]?>" id="isbn" name="isbn" type="text"><br><br>
                            <label for="titre">Titre :</label><br><input value="<?=$livre["titre"]?>" id="titre" name="titre" type="text"><br><br>
                            <label for="date_parution">Date de parution :</label><br><input value="<?=$livre["date_parution"]?>" id="date_parution" name="date_parution" type="date"><br><br>
                            <label for="nb_page">Nombre de pages:</label><br><input value="<?=$livre["nb_page"]?>" id="nb_page" name="nb_page" type="number"><br><br>
                            <label for="prix">Prix</label><br><input value="<?=$livre["prix"]?>" id="prix" name="prix" type="text"><br><br>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="description">Description :</label><br><textarea id="description" name="description"  cols="30" rows="3"> <?=$livre["description"]?></textarea><br><br>
                            <p>Nombre d'auteurs : </p> <select name="" id="nb_auteur">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <div id="auteurs"class="auteurs">
                            <label for="nom_auteur">Nom auteur :</label><br><input value="<?=$nom_auteur?>" type="text" id="nom_auteur" name="nom_auteur"><br><br><label for="prenom_auteur">Prénom auteur :</label><br><input value="<?=$prenom_auteur?>" type="text" id="prenom_auteur" name="prenom_auteur"><br><br>
                            </div>
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


            
       
        <script>
            const nombre = document.querySelector("#nb_auteur");
            const auteurs =document.querySelector("#auteurs");
            
            const expression = '<label for="nom_auteur">Nom auteur :</label><br><input value="' + '<?= $nom_auteur?>' + '" type="text" id="nom_auteur" name="nom_auteur[]" ><br><br><label for="prenom_auteur">Prénom auteur :</label><br><input value="' +'<?=$prenom_auteur?>'+'" type="text" id="prenom_auteur" name="prenom_auteur[]"><br><br>'
            nombre.addEventListener("change",()=>{
                auteurs.innerHTML = expression 
                for (let index = 1; index < nombre.value; index++) {
                    auteurs.innerHTML += expression;
                    }
                    console.log(auteurs.innerHTML)
            })
            $.ajax({
  url: 'index.php?page=/modifierLivre.php',
  success: function(data) {
    // var name = data.name;
    // var age = data.age;
    // var city = data.city;
    console.log(data);
  }
});

        </script>