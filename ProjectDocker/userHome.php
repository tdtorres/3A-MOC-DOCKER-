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

}
else{
    header("Location:./index.php");
}
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'select COUNT(idUser) as nbbibl from userlibrary where idUser=?';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_SESSION['id']]);
$data = $resp->fetch();
?>
<h1>Bonjour <?php echo $_SESSION['login'] ?></h1>
<h1>Vous avez  <?php echo $data['nbbibl']?> bibliotheque</h1>
<form action="libraryUser.php" method="post">

</form>



</body>
</html>