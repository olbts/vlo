<div class=" bg bg-info text-center">
    <h1 class="text-danger">Admin Panel</h1>
</div>
<div class="adminPanel">
    
    <form action="index.php?page=/admin" method="post">
    <label for="">Login</label><br>
    <input name ="login" type="text"><br><br>
    <label for="">Mot de passe</label><br>
    <input name="password" type="text"><br><br>
    <input type="submit" value="Connexion">
</form>
 
<style>
    .adminPanel{
        display: flex;
        justify-content: center;
        align-content: center;
    }
</style>