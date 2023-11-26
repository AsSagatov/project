<?php
require_once "functions.php";

unset($_SESSION["logged"]);
unset($_SESSION["user_id"]);
unset($_SESSION["is_admin"]);
redirect("users.php");