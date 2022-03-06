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


<?php if($data['nbbibl']!='0')
    $request2 = 'select idUserLibrary,Libelle from userlibrary where idUser=?';
    $resp2 = $mysqlClient->prepare($request2);
    $resp2->execute([$_SESSION['id']]);
    $data2 = $resp2->fetchAll();



    echo '<form action="libraryUser.php" method="post">
<label for="library">choisisez votre librairie</label>
 <select name="library" id="library">
     <option value="">choisisez votre librairie</option>
     ';
    foreach ($data2 as $key =>$lib){
        echo '<option value="'.$lib["idUserLibrary"].'">'.$lib["Libelle"].'</option>';
    }
    
    
echo
    '
 </select>
    <div class="button" >
        <input type="submit" value="regardez votre librairie">
    </div>

</form>';



    ?>

<hr>

<form action="insertLibrary.php" method="post">
<h2>Ajoutez une librairie</h2>
    <div class ="libelle">
        <label for="libelle"> entrez le libelle de votre librairie</label>
        <input type="text" name="libelle" id="libelle">
    </div>
    <div class="description">
        <label for="description">entrez la description de votre librairie</label>
        <input type="text" name="description" id="description">
    </div>
    <div class="button" >
        <input type="submit" value="ajoutez votre librairie">
    </div>
</form>
<hr>




</body>
</html>