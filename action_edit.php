<?php
require_once "functions.php";

// $_POST["id"] = $_GET["id"];

change_general_information_by_id($_POST, $_GET["id"]);

$_SESSION["success"] = "Профиль успешно обновлен.";
redirect("users.php");