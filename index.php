<?php
session_start();
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

    <title>Project</title>
</head>
<body>
    <header>
        <button class = "btn-sign-in">Войти</button>
        <button>Зарегестрироваться</button>
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

        <div class="book-container">
            <?php
            $books = new Books();
            $data = $books->getAllData();
            while($row = $data->fetch_assoc()){
                if($row["image_path"] == null)$row["image_path"] = "./images/nf.png";
                 echo "<div class='item-book'>
                 <img class='book-image' src='$row[image_path]' alt=''>
                 <h2>$row[name]</h2>
                 <p>authors</p>
                </div>";
            }
            
            ?>
        </div>
    </main>
   <footer>
        подвал сайта 
   </footer>

   <div class="model-window-signIn">
    <form class="form-authorisation" method="POST">
        <label for="">Фамилия</label>
         <input name="lname-signIn" required type="text" placeholder="Введите свою фамилию">
        <label for="">Имя</label>
         <input type="text" name="fname-signIn" required placeholder="Введите своё имя">
         <label for="">Отчество</label>
         <input type="text" name="surname-signIn" placeholder="Введите своё отчество">
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