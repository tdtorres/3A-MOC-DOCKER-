<?php
session_start();
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=bibliotheque;charset=utf8',
    'root',
    ''
);

$sqlQuery = 'select book.isbn,title,author,overview,picture,viewCount
from book
left join contains c on book.isbn = c.ISBN

where c.idUserLibrary=?';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([$_POST['library']]);
$recipes = $recipesStatement->fetchAll();
if ($recipesStatement->rowCount() == 0) {
    echo "<h1>vous n'avez aucun livre</h1>";
    echo "<a href> créer un livre </a>";
}


?>

<a href="userHome.php"> retournez a la page d'accueil</a>
<div class="rajoutBook">
    <H1>Rajoutez un livre</H1>
    <form action="insertBook.php" method="post" class="form-login">
        <input hidden type="hidden" name="library" id="library" value="<?php echo $_POST['library']; ?>">
        <div>
            <label> ISBN </label>
            <input type="text" name="isbn" id="isbn" required>
        </div>
        <div>
            <label> Titre </label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label> Auteur </label>
            <input type="text" name="author" id="author" required>
        </div>
        <div>
            <label> Detail </label>
            <input type="text" name="overview" id="overview">
        </div>
        <div>
            <label> Picture </label>
            <input type="text" name="picture" id="picture">
        </div>

        <div class button>
            <input type="submit" value="rajoutez le livre">
        </div>
    </form>
</div>
<hr>
<div class="details book">
    <form action="bookDetails.php" method="post">
        <div>
            <input hidden type="hidden" name="library" id="library" value="<?php echo $_POST['library']; ?>">
            <label for="book"> voir plus de détail</label>
            <select name="book" id="book">
                <option value="">choisisez votre livre</option>
                <?php
                foreach ($recipes as $key => $book) {
                    echo '<option value="' . $book["isbn"] . '">' . $book['title'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="button">
            <input type="submit" value="regardez votre livre en détail">
        </div>

    </form>
</div>
<hr>
<div class="supprimerBook">
    <form action="deleteBook.php" method="post">
        <div>
            <input hidden type="hidden" name="library" id="library" value="<?php echo $_POST['library']; ?>">
            <label for="book"> choissisez le livre a supprimer</label>
            <select name="book" id="book">
                <option value="">choisisez votre livre</option>
                <?php
                foreach ($recipes as $key => $book) {
                    echo '<option value="' . $book["isbn"] . '">' . $book['title'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="button">
            <input type="submit" value="supprimez votre livre">
        </div>

    </form>
</div>
<hr>
<div class="updateBook">
    <form action="modifyBook.php" method="post">
        <div>
            <input hidden type="hidden" name="library" id="library" value="<?php echo $_POST['library']; ?>">
            <label for="book"> choissisez le livre a modifier</label>
            <select name="book" id="book">
                <option value="">choisisez votre livre</option>
                <?php
                foreach ($recipes as $key => $book) {
                    echo '<option value="' . $book["isbn"] . '">' . $book['title'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="button">
            <input type="submit" value="supprimez votre livre">
        </div>
</div>
<hr>
<table style="border: black 1px solid">
    <thead>
    <tr>

        <td>title</td>
        <td>author</td>
        <td>viewcount</td>

    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($recipes as $key => $data) {
        echo "<tr >";

        echo "<td>" . $data['title'] . "</td>";
        echo "<td>" . $data['author'] . "</td>";
        echo "<td>" . $data['viewCount'] . "</td>";

        echo "</tr>";
    }


    ?>


    </tbody>
</table>
<style>
    table,
    td {
        border: 1px solid #333;
    }

    thead,
    tfoot {
        background-color: #333;
        color: #fff;
    }

</style>

