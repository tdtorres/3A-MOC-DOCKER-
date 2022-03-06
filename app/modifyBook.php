<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);
$request = 'SELECT isbn,title,author,overview,picture,viewCount from book where isbn=?';
$resp = $mysqlClient->prepare($request);
$resp->execute([$_POST['book']]);
$data = $resp->fetch();
?>

<form method="post" action="updateBook.php">
    <input hidden type="hidden" name="isbn" id="isbn" value="<?php echo $_POST['book']; ?>">
    <input type="text" name="title" value="<?php echo $data['title']; ?>">
    <input type="text" name="author" value="<?php echo $data['author'];?>">
    <input type="text" name="overview" value="<?php echo $data['overview']; ?>">
    <input type="text" name="picture" value="<?php echo $data['picture']; ?>">
    <input type="text" name="viewCount" value="<?php echo $data['viewCount']; ?>">

    <div class="button">
        <input type="submit" value="supprimez votre livre">
    </div>



</form>
