<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
//if value already exist just add into the library and alert else add into book and all;
$sqlQuery = 'SELECT isbn FROM book where isbn=?';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([$_POST['isbn']]);
$recipes = $recipesStatement->fetch();
if ($recipesStatement->rowCount()==0){
    $request = 'INSERT INTO book(isbn, title, author, overview, picture, viewCount) VALUES (?,?,?,?,?,1);
            insert INTO  contains(isbn, iduserlibrary) VALUES (?,?)';
    $resp = $mysqlClient->prepare($request);
    $resp->execute([$_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['overview'], $_POST['picture'],$_POST['isbn'],$_POST['library']]);

    header('Location: ./');
    exit();
}
else{
    $request = 'insert INTO  contains(isbn, iduserlibrary) VALUES (?,?)';
    $resp = $mysqlClient->prepare($request);
    $resp->execute([$_POST['isbn'],$_POST['library']]);
    header('Location: ./');
    exit();

}










