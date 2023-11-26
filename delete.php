<?php
require_once "functions.php";
var_dump($_SESSION);
// exit;
isLogged();
// checkAccess();

delete_user_by_id($_GET["id"]);

if($_SESSION["user_id"] == $_GET["id"]){
    redirect("unlog.php");
}else{
    $_SESSION["success"] = "Пользователь успешно удален";
    redirect("users.php");
}