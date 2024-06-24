<div class="bg bg-body-tertiary  text-center">
    <h1 class="text-danger">Détail client</h1>
</div>
<div class="row">
    <div class="col-12 col-md-3">
        <?php require "views/partials/sideAdmin.php"?>
    </div>
    <div class="col-12 col-md-9">
<form action="" method="post">
                    <h4>Informations personnelles :</h4>
                    <h6>Utilisateur : <?=$infos["email"] ?></h6>
                    <input type="hidden" name="email" value="<?=$infos["email"] ?>">
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