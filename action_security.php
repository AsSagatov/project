<?php
require_once "functions.php";

$emails = get_account_by_email_except_id($_POST["email"], $_GET["id"]);

if(!empty($emails)){
    $_SESSION["error"] = "Этот эл. адрес уже занят другим пользователем.";
    redirect("security.php?id=" . $_GET["id"]);
}

if($_POST["password"] == $_POST["password_confirmation"]){

    update_login_by_id($_POST, $_GET["id"]);
    $_SESSION["success"] = "Профиль успешно обновлен";
    redirect("users.php");

}