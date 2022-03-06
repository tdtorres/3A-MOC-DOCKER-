<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'SELECT idUser,login,mdp FROM user';
$resp = $mysqlClient->prepare($request);
$resp->execute();
$users = $resp->fetchAll();

foreach ($users as $key => $user) {
    if ($user['login'] == $_POST["login"]) {
        if ($user['mdp'] == $_POST["password"]) {
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id'] = $user['idUser'];
            header('Location:./userHome.php');
            exit();
        }
    }
}
header('Location: ./');
exit();

