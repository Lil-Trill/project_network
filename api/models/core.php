<?php
require_once("./config.php");
class Core{
    protected $connect;

    public function __construct(){
        $this->connect = new mysqli(HOST,USER,PASS,DB);
        $this->connect->set_charset("utf8");
        if($this->connect->connect_error)
            exit("нет соединения с БД !".$this->connect_error);
    }
    public function __destruct(){
        $this->connect->close();
    }
}