<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель админа</title>
</head>
<body>
    <main>
        <div class="bookspanel">
            <?php
                require './config.php';
                $connect = inc();

                $sql = "SELECT * 
                FROM `books`
                JOIN book_author ON books.id_book = book_author.id_book
                JOIN authors ON authors.id_authors = book_author.id_author";

                $data = mysqli_query($connect,$sql);

                while($row = $data->fetch_assoc()){
                    if($row["image_path"] == null)$row["image_path"] = "./images/nf.png";
                    echo "<div class='item-book' data-id='$row[id_book]'>
                    <img class='book-image' src='$row[image_path]' alt=''>
                    <h2 class='book-title'>$row[name]</h2>
                    <div class='author-name'>
                        <p/>Автор:</p>
                        <p/ class='lname'>$row[lname]</p>
                        <p/ class='fname'>$row[fname]</p>
                        <p/ class='surname'>$row[surname]</p>
                    </div>
                    <button class='deleted'>удалить книгу</button>
                    </div>";
                }
            ?>
        </div>
    </main>
</body>
</html>