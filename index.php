<?php
session_start();
require './config.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="js/libraries/jsquery.js"></script>
    <script defer src="./js/main.js"></script>
    <script defer src="./js/fetchSignIn.js"></script>
    <script defer src="./js/fetchSortAuthors.js"></script>
    <script defer src="./js/fetchDetail.js"></script>
    <title>Project</title>
</head>
<body>
    <header>
        <button class = "btn-sign-in">Войти</button>
        <button>Зарегестрироваться</button>
        <?php
            unset($_SESSION['user']);
            if(isset($_SESSION['user'])){
                $fname = $_SESSION['user']['fname'];
                $lname = $_SESSION['user']['lname'];
                echo "
                <p class='fname-header'>
                    $fname
                </p>
                <p class='lname-header'>
                    $lname
                </p>
                ";
            }
        ?>
    </header>
    <main>
    <?php
    require("./api/models/model_book.php");
    // while($row = $result->fetch_assoc()){
    //     echo "$row[title] <br>";
    //     if($row["copacity_pages"] == null)
    //         echo "нет данных о количестве страниц <br>";
    // }

    
        ?>

    <div class="list-authors">
        <?php
        $connectBooks = inc();
        $dataBooks = $connectBooks->query("SELECT * FROM `authors` WHERE 1") ;
        ?>
        <form class="form-choose_authors">
            <?php
                 while($row = $dataBooks->fetch_assoc()){
                    echo "
                    <p/><input class='fullname-auhtor' type='radio' name='authors' value='$row[id_authors]'>$row[fname] $row[lname] $row[surname]</p>";
                }
            ?>
            <input class="btn-sort-authors" type="submit" value="Соритровать">
        </form>
    </div>
        <div class="book-container">
            <?php
            $books = new Books();
            $data = $books->getAllData();
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
                 
                </div>";
            }
            ?>
            
        </div>
        <div class="model-window-detail-book">
            
   </div>
    </main>
   <footer>
        подвал сайта 
   </footer>

   <div class="model-window-signIn">
    <form class="form-authorisation" method="POST">
         <label for="">Логин</label>
         <input type="text" name="login-signIn" required placeholder="Введите свой логи">
         <label for="">Пароль</label>
         <input type="password" name="password-signIn" required  placeholder="Введите свой пароль">
         <input class="submit-signIn" type="submit" value="Войти">
         <p>если у вас нет аккаунта - <a href="/">зарегестрируйтесь</a></p>
         <p class='msg-signIn'></p
         
    </form
   </div>
</body>
</html>



<!-- Главная страница сайта – список книг в библиотеки. Каждая карточка книги включает – фотографию обложки, название, автор/ы. Книги можно фильтровать по автору. Можно осуществлять поиск книги по названию.
При клике на карточку должно открываться модальное окно или отдельная страница с детальной информацией: фотография, название, автор, год издания, количество страниц, три страницы книги. 
Должна быть возможность войти в систему. Форма авторизации включает поле логин и пароль. Должна быть возможность выйти из профиля. При в ходе под логином и паролем на сайте отображается имя пользователя, вошедшего в систему.
Если пользователь авторизовался у на главной странице у карточек книг появляется кнопка Добавить в избранное. 
Должна быть страница с профилем пользователя. На этой странице появляется список избранных книг.
 -->

 <!-- 
    SELECT * 
FROM `books`
JOIN book_author ON books.id_book = book_author.id_book
JOIN authors ON authors.id_authors = book_author.id_author
WHERE authors.fname = 'Ремарк' 
-->