<?php
session_start();
require_once '../config.php';
$data = inc();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$login = $_POST['login'];
$password = $_POST['login'];

$checkUser = mysqli_query($data, "SELECT * FROM `users` WHERE `password` = '$password' AND `login` = '$login'");

if(mysqli_num_rows($checkUser) > 0){
    $user = mysqli_fetch_assoc($checkUser);
    
    $_SESSION['user'] = [
        "id" => $user["id_user"],
        "login" => $user["login"],
        "fname" => $user["fname"],
        "lname" => $user["lname"],
        "surname" => $user["surname"]
    ];
    echo "авторизация прошла успешно";
}
else{
    echo "неверный логин или пароль"; 
}






