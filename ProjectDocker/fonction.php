<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$sqlQuery = 'SELECT * FROM user';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();
foreach ($recipes as $key => $recipe) {
    foreach ($recipe as $key2 => $data) {
        echo "<p>" . $data . "</p>";
    }

}
