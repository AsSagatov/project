<?php
require_once "functions.php";

$_POST["email"] = trim($_POST["email"]);

if(email_not_in_DB($_POST["email"])){
    insert_email($_POST);
    $_SESSION["success"] = "Регистрация успешна";
    redirect("page_login.php");
}else{
    $_SESSION["error"] = "Этот эл. адрес уже занят другим пользователем.";
    redirect("page_register.php");
}



// function email_not_in_DB($email){
//     $pdo = new PDO("mysql:host=localhost;dbname=project_modul1", "root", "");
//     $query = "SELECT * FROM `users` WHERE `email` = :email";
//     $statement = $pdo->prepare($query);
//     $statement->execute(["email" => $email]);
//     $exist = $statement->fetch(PDO::FETCH_ASSOC);
//     // var_dump($exist);/
//     return empty($exist);
// }


// function insert_email($data){
//     $pdo = new PDO("mysql:host=localhost;dbname=project_modul1", "root", "");
//     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
//     $query = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
//     $statement = $pdo->prepare($query);
//     $result = $statement->execute($data);
// }