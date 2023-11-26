<?php
require_once "functions.php";


if(email_not_in_DB($_POST["email"])){
    insert_account($_POST);
    $_SESSION["success"] = "Пользователь успешно зарегестрирован";
    redirect("users.php");
}else{
    $_SESSION["error"] = "Этот эл. адрес уже занят другим пользователем.";
    redirect("create_user.php");
}