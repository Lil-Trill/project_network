<?php
session_start();
require_once '../config.php';
$data = inc();

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$password = $_POST['password'];

// $response = [
//                 "lname" => $lname,
//                 "fname" => $fname,
//                 "surname" => $surname,
//                 "login" => $login,
//                 "password" => $password
//             ];


$sql = "SELECT * FROM `users` WHERE users.login = '$login'";

$checkLogin = mysqli_query($data,$sql);

if(mysqli_num_rows($checkLogin) != 0){
    $response = [
        "type" => 1,
        "message" => "такой логин уже есть упс"
    ];
    echo json_encode($response);
}
else{
    $insert = "INSERT INTO `users`(`lname`, `fname`, `surname`, `login`, `password`) VALUES ('$lname','$fname','$surname','$login','$password')";
    $pushUser = $data->query($insert);
    if($pushUser){
        $response = [
            "type" => 1,
            "message" => "добавлен юзер"
        ];
    }
    else {
        $response = [
            "type" => 1,
            "message" => "чот пошло не так"
        ];
    }
    
    echo json_encode($response);
}