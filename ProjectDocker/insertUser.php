<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'INSERT INTO user (idUser, login, mdp) VALUES (null,?,?)';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_POST['login'],$_POST['password']]);
header('Location: ./');
exit();