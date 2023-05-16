<?php
require("./api/models/core.php");
class Books extends Core{
    private $data;
    public function getAllData(){
        $sql = "SELECT * FROM `books` WHERE 1";
        $this->data = $this->connect->query($sql);
        return $this->data;
    }
}