<?php
session_start();
function getPDO(){
    $host = "localhost";
    $dbname = "project_modul1";
    $account = "root";
    $password = "";
    return $pdo = new PDO("mysql:host=$host;dbname=$dbname", $account, $password);
}
function email_not_in_DB($email){
    return empty(get_account_by_email($email));
    // return empty($exist);
}
function get_account_by_email($email){
    $pdo = getPDO();
    $query = "SELECT * FROM `users` WHERE `email` = :email";
    $statement = $pdo->prepare($query);
    $statement->execute(["email" => $email]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function get_account_by_email_except_id($email, $id){
    $pdo = getPDO();
    $query = "SELECT * FROM `users` WHERE `email` = :email AND `id` != :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["email" => $email, "id" => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function get_account_by_id($id){
    $pdo = getPDO();
    $query = "SELECT * FROM `users` WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["id" => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function update_status_by_id($status, $id){
    $pdo = getPDO();
    $query = "UPDATE `users` SET `status` = :status WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["status" => $status, "id" => $id]);
}
function update_login_by_id($data, $id){
    $pdo = getPDO();
    $query = "UPDATE `users` SET `email` = :email, `password` = :password WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["email" => $data["email"], "id" => $id, "password" => password_hash($data["password"], PASSWORD_DEFAULT)]);
}
function change_general_information_by_id($data, $id){
    $pdo = getPDO();
    $query = "UPDATE `users` SET `username` = :username, `title` = :title, `telephone_number` = :telephone_number, `address` = :address WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $data["id"] = $id;
    $statement->execute($data);
}
function getAllUsers(){
    $pdo = getPDO();
    $query = "SELECT * FROM `users`";
    $statement = $pdo->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC); 
}
function insert_email($data){
    $pdo = getPDO();
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
    $statement = $pdo->prepare($query);
    $statement->execute($data);
}
function insert_account($data){

    if(file_downloaded("user_image")){
        $data["user_image"] = upload_image_and_return_path("user_image");
    }else{
        $data["user_image"] = "";
    }

    $pdo = getPDO();
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`id`, `email`, `password`, `status`, `username`, `title`, `telephone_number`, `address`, `user_image`, `vk`, `telegram`, `instagram`) VALUES 
                                  (NULL, :email, :password, :status, :username, :title, :telephone_number, :address, :user_image, :vk, :telegram, :instagram);";
    $statement = $pdo->prepare($query);
    $result = $statement->execute($data);
}

function redirect($path){
    header("Location: /project-main/" . $path);
    exit;
}
function echoNotice(){
    if(!empty($_SESSION["error"])){
        echo "<div class=\"alert alert-danger\"><strong>Уведомление!</strong>" . $_SESSION["error"] . "</div>";
        unset($_SESSION["error"]);
    }elseif(!empty($_SESSION["success"])){
        echo "<div class=\"alert alert-success\">" . $_SESSION["success"] . "</div>";
        unset($_SESSION["success"]);
    }
}
function isLogged(){
    if(!$_SESSION["logged"]){
        redirect("page_login.php");
    }
}
function isAdmin(){
    return $_SESSION["is_admin"];
}
function checkAccess($id){
    return ($_SESSION["is_admin"] || $_SESSION["user_id"] == $id);
}
function file_downloaded($file_name){
    return $_FILES[$file_name]["error"] != 4;
}
function file_not_downloaded($file_name){
    return !file_downloaded($file_name);
}
function upload_image_and_return_path($file_name){
    $image_name = pathinfo($_FILES[$file_name]["name"]);
    $image_path = "uploads/" . uniqid() . "." . $image_name["extension"];
    move_uploaded_file($_FILES[$file_name]["tmp_name"], $image_path);
    return $image_path;
}
function delete_old_image_by_id($id){
    $pdo = getPDO();

    $query = "SELECT `user_image` FROM `users` WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["id" => $id]);
    $delete = $statement->fetch(PDO::FETCH_ASSOC);

    unlink($delete["user_image"]);
}
function insert_new_image_by_id($image_path, $id){
    $pdo = getPDO();
    $query = "UPDATE `users` SET `user_image` = :user_image WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["user_image" => $image_path, "id" => $id]);
}
function delete_user_by_id($id){
    $pdo = getPDO();
    $query = "DELETE FROM `users` WHERE `id` = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(["id" => $id]);
}

