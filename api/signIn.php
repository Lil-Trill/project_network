<?php
session_start();
require_once '../config.php';
$data = inc();

$login = $_POST['login'];
$password = $_POST['password'];

$error_fileds = [];

if($login == ""){
    $error_fileds[] = "login-signIn";
}

if($password == "") $error_fileds[] = "password-signIn";

if(!empty($error_fileds)){
    $response =[
        "status" => false,
        "type" => 1,
        "message" => "проверьте правильность полей",
        "fields" => $error_fileds
    ];

    echo json_encode($response);  

    die();
}

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

    if($user["login"] == "admin" && $user["password"] == "admin"){
        $response = ["status" => "admin"];
        echo json_encode($response);
    }
    else{
        $response = ["status" => true ];
        echo json_encode($response);
    }
}
else{
    $response = [
        "status" => false,
        "message" => "неверный логин или пароль"
    ];
    echo json_encode($response); 
}