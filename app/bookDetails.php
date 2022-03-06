<?php
session_start();
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);

$sqlQuery = 'select isbn,title,author,overview,picture,viewCount
from book
where isbn=?';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([$_POST['book']]);
$recipes = $recipesStatement->fetch();
echo '<p>ISBN : '.$recipes["isbn"].'.</p>';
echo '<p>Title : '.$recipes["title"].'.</p>';
echo '<p>Author : '.$recipes["author"].'.</p>';
echo '<p>Overview : '.$recipes["overview"].'.</p>';
echo '<p>Picture : '.$recipes["picture"].'.</p>';
echo '<p>viewCount : '.$recipes["viewCount"].'.</p>';


?>
<form action="libraryUser.php" method="post">
    <input hidden type="hidden" name="library" id="library" value="<?php echo $_POST['library']; ?>">
    <div class="button" >
        <input type="submit" value="revenir a votre librairie">
    </div>
</form>


