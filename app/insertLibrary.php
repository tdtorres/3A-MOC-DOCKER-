<?php
session_start();
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'INSERT INTO userlibrary (idUserLibrary, Libelle, description,idUser) VALUES (null,?,?,?)';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_POST['libelle'],$_POST['description'],$_SESSION['id']]);
header('Location: ./');
exit();