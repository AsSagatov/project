<?php
require_once "functions.php";

update_status_by_id($_POST["status"], $_GET["id"]);
$_SESSION["success"] = "Профиль успешно обновлен";
redirect("users.php");