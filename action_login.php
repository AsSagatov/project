<?php
require_once "functions.php";

$email = trim($_POST["email"]);

if(email_not_in_DB($email)){
    $_SESSION["error"] = "Email не зарегестрирован";
    redirect("page_login.php");
}

$account = get_account_by_email($email);

if(password_verify($_POST['password'], $account["password"])){
    $_SESSION["logged"] = true;
    $_SESSION["is_admin"] = (bool) $account['is_admin'];
    $_SESSION["user_id"] = $account["id"];
    redirect("users.php");
}else{
    $_SESSION["error"] = "Не правильный пароль";
    redirect("page_login.php");
}