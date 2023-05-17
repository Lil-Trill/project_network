<?php
require("./api/models/core.php");
class Books extends Core{
    private $data;
    public function getAllData(){
        $sql = "SELECT * 
        FROM `books`
        JOIN book_author ON books.id_book = book_author.id_book
        JOIN authors ON authors.id_authors = book_author.id_author";
        $this->data = $this->connect->query($sql);
        return $this->data;
    }
}