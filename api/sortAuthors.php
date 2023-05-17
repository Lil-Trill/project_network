<?php
require_once '../config.php';
$data = inc();

$idAuthor = $_POST['id'];

$sql = "SELECT * 
FROM `books`
JOIN book_author ON books.id_book = book_author.id_book
JOIN authors ON authors.id_authors = book_author.id_author
WHERE authors.id_authors = $idAuthor";

$content = mysqli_query($data,$sql);

if(mysqli_num_rows($content) > 0){
    $table = mysqli_fetch_assoc($content);
    echo $table['fname'];
}
else {
    echo "чота нито";
}
?>