<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['login'])){

    header('Location:./userHome.php');
}

?>

<H1>connectez vous</H1>
<form action="login.php" method="post" class="form-login">
    <div class="login">
        <label for="login"> Entrez votre login</label>
        <input type="text" name="login" id="login" required>
    </div>
    <div class="mdp">
        <label for="password">entrez votre mdp</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class="button" >
        <input type="submit" value="se connecter">
    </div>
</form>
<a href="subscribe.php">inscrivez vous des maintenant ! </a>

</body>
</html>