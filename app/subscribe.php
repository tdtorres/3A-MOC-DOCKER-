<!DOCTYPE html>
<html>
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

<H1>inscrivez vous</H1>
<form action="insertUser.php" method="post" class="form-login">
    <div class="login">
        <label> Entrez votre login</label>
        <input type="text" name="login" id="login" required>
    </div>
    <div class="mdp">
        <label>entrez votre mdp</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class button>
        <input type="submit" value="s'inscrire">
    </div>
</form>
<a href="index.php">connectez vous des maintenant ! </a>

</body>
</html>