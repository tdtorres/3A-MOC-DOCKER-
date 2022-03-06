<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'DELETE FROM contains where idUserLibrary=? AND ISBN=?';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_POST['library'], $_POST['book']]);
header('Location: ./');
exit();