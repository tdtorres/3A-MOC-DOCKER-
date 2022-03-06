<?php
session_start();
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'update book SET title=?,author=?,overview=?,picture=?,viewCount=? where isbn=?';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_POST['title'],$_POST['author'],$_POST['overview'],$_POST['picture'],$_POST['viewCount'],$_POST['isbn'],]);
header('Location: ./');
exit();