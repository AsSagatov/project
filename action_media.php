<?php
require_once "functions.php";

if(file_not_downloaded("new_image")){
    $_SESSION["error"] = "Вы не загрузили новую картинку";
    redirect("media.php?id=" . $_GET["id"]);
}

$image_path = upload_image_and_return_path("new_image");

delete_old_image_by_id($_GET["id"]);
insert_new_image_by_id($image_path, $_GET["id"]);

$_SESSION["success"] = "Профиль успешно обновлен";
redirect("users.php");
