<?php
    require_once '../config.php';
    $data = inc();
    $idBook = $_POST['idBook'];

    $sql = "SELECT * 
    FROM `books`
    JOIN book_author ON books.id_book = book_author.id_book
    JOIN authors ON authors.id_authors = book_author.id_author
    WHERE books.id_book = $idBook";


$content = mysqli_query($data,$sql);
if(mysqli_num_rows($content) > 0){
    $book = mysqli_fetch_assoc($content);
    $response = [
        "status" => true,
        "id" => $book['id_book'],
        "title" => $book['title'],
        "name" => $book['name'],
        "image_path" => $book['image_path'],
        "copacity_pages" => $book['copacity_pages'],
        "the_year_of_publishing	" => $book['the_year_of_publishing'],
    ];

    echo json_encode($response);
}
 ?>
