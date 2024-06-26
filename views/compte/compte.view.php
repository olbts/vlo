
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                <?php require "views/partials/sideCompte.php"?>
                </div>
                <div class="col-md-9 col-12 ">
                <h3 class="text-info center mb-4">Informations compte</h3>
                <div class="row ">
                    <h4 class="mb-3">Adresse mail : <?=$_SESSION["email"]?></h4>
                    
                    <form action="" method="post">
                    <h6>Modifier le mot de passe :</h6>
                        
                        <input type="hidden" name="updatePassword" value="updatePassword">
                        <label for="">Mot de passe actuel :</label>
                        <input type="text" name="oldPassword">
                        <label for="">Nouveau mot de passe :</label>
                        <input type="text" name="newPassword">
                        
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                    <p class=<?= $info[0]?>><?= $info[1]?></p>
                    <form action="" method="post">
                    <h6>Informations personnelles :</h6>
                    <input type="hidden" name="infos">
                        <label for="">Nom :</label>
                        <input type="text" name="nom" value='<?= $infos["nom"] ??""?>'>
                        <label for="">Prenom :</label>
                        <input type="text" name="prenom" value='<?= $infos["prenom"] ??""?>'><br>
                        <label for="">Adresse :</label>
                        <input type="text" name="adresse" value='<?= $infos["adresse"] ??""?>'>
                        <label for="">Date de naissance :</label>
                        <input type="date" name="dob" value='<?= $infos["dob"] ??""?>'><br>
                       <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
                <div class="row mt-5">
                <h6>Commentaires :</h6>
                <?php if ($commentaires->set()) : ?>
                    <?php foreach ($commentaires->getArticles() as $key => $commentaire) :?>
                        <hr>
                        <p>Isbn : <?= $commentaire["isbn"]?> | Note : <?= $commentaire["note"]?>/5</p>
                        <p><?= $commentaire["titre"]?></p>
                        <p><?= $commentaire["message"]?></p>
                        <hr>
                    <?php endforeach ?>
                <?php endif; ?>
                <?php if (!$commentaires->set()) : ?>
                    <p>Vous n'avez pas encore posté de commentaire.</p>
                <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
   
